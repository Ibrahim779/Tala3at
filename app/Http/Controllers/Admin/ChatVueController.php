<?php

namespace App\Http\Controllers\Admin;

use App\Events\AdminSentMessage;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminChatResource;
use App\Http\Resources\AdminMessageResource;
use App\Models\AdminChat;
use App\Models\AdminMessage;
use Illuminate\Http\Request;

class ChatVueController extends Controller
{

    public function index()
    {
        return view('admin.chatsVue.index');
    }

    public function fetch()
    {
        return AdminChatResource::collection(AdminChat::myChats()->get());
    }

    public function getMessages($chatId)
    {
        $this->makeReceiverMessagesIsSeen($chatId);

        return AdminMessageResource::collection(AdminMessage::whereAdminChatId($chatId)->get());
    }

    public function sendMessage(Request $request)
    {
        $message = AdminMessage::create($this->getData($request));

        broadcast(new AdminSentMessage($message))->toOthers();

        return new AdminMessageResource($message);
    }

    public function search(Request $request)
    {

    }

    private function getData($request)
    {
        return [
            'message' => $request->message,
            'admin_chat_id' => $request->chatId,
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
