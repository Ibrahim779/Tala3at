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
        return ['firebase', 'toDatabase'];
    }

    public function toFirebase($notifiable)
    {
        $devicesToken = $this->meeting->users()->devices()->get()->pluck('token');

        return (new FirebaseMessage())
            ->withTitle($this->meeting->getTitleAttribute())
            ->withBody($this->meeting->getDescriptionAttribute())
            ->asNotification($devicesToken); // OR ->asMessage($deviceTokens);
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->meeting->getTitleAttribute(),
            'body'  => $this->meeting->getDescriptionAttribute(),
        ];
    }

}
