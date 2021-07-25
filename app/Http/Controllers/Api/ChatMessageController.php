<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{

    public function index(Chat $chat)
    {
        return MessageResource::collection(Message::whereChatId($chat->id)->get());
    }

    public function store(Chat $chat, MessageRequest $request)
    {
        $message = Message::create($request->merge([
            'user_id' => auth()->id(),
            'chat_id' => $chat->id
        ])->all());

        broadcast(new MessageSent($message))->toOthers();

        return new MessageResource($message);
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return response()->json(null, 204);
    }

}
