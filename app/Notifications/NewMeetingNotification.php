<?php

namespace App\Notifications;

use App\Models\Meeting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Kutia\Larafirebase\Messages\FirebaseMessage;

class NewMeetingNotification extends Notification
{
    use Queueable;

    private $meeting;

    private $devicesTokens = [];

    /**
     * Create a new notification instance.
     *
     * @param Meeting $meeting
     */
    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['firebase', 'database'];
    }

    public function toFirebase($notifiable)
    {
        $this->setTokens();

        return (new FirebaseMessage())
            ->withTitle($this->meeting->getTitleAttribute())
            ->withBody($this->meeting->getDescriptionAttribute())
            ->asNotification($this->devicesTokens); // OR ->asMessage($deviceTokens);
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->meeting->title,
            'body'  => $this->meeting->description,
        ];
    }

    private function setTokens()
    {
        $users = $this->meeting->users()->get();
        foreach ($users as $user) {
            $this->devicesTokens[] = $user->devices()->get()->pluck('token');
        }
    }

}
