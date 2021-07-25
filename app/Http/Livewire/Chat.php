<?php

namespace App\Http\Livewire;

use App\Events\AdminSentMessage;
use App\Models\AdminChat;
use App\Models\AdminMessage;
use Livewire\Component;

class Chat extends Component
{
    public $chatId;

    public $messages = [];

    public $message;

    public function render()
    {
        $chats = AdminChat::myChats()->get();

        return view('livewire.chat', [
            'chats' => $chats,
            'messages'    => $this->getMessages(),
        ]);
    }

    public function setChatId($chatId)
    {
        $this->chatId = $chatId;
    }

    public function getMessages()
    {
        $this->messages = AdminMessage::whereAdminChatId($this->chatId)->get();

        $this->makeReceiverMessagesIsSeen($this->chatId);
    }

    public function sendMessage()
    {
        if ($this->message) {
            $message = AdminMessage::create($this->getData());

            broadcast(new AdminSentMessage($message))->toOthers();

            $this->clearMessage();
        }
    }

    public function getListeners()
    {
        return [
            "echo-private:admin.chats.{$this->chatId}, AdminSentMessage" => 'pushMessage',
        ];
    }

    public function pushMessage()
    {
        dd('test');
    }

    public function clearMessage()
    {
        $this->message = null;
    }

    private function getData()
    {
        return [
            'message' => $this->message,
            'admin_chat_id' => $this->chatId,
            'admin_id' => auth()->id()
        ];
    }

    private function makeReceiverMessagesIsSeen($chatId)
    {
        $receiverMessages = AdminMessage::receiverMessages($chatId)->get();

        foreach ($receiverMessages as $message) {
            $message->is_seen = true;
            $message->save();
        }
    }

}
