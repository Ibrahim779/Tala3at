<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use App\Http\Resources\ChatResource;
use App\Models\Chat;
use App\Models\Meeting;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function index()
    {
        return ChatResource::collection(Chat::myChats()->get());
    }

    public function show(Chat $chat)
    {
        return new ChatResource($chat);
    }

    public function store(Meeting $meeting)
    {
        $chat = $this->firstOrCreate($meeting);

        return redirect()->route('api.chat.show', $chat->id);
    }

    public function update(Chat $chat, ChatRequest $request)
    {
        $chat->update($request->all());

        return new ChatResource($chat);
    }

    public function delete(Chat $chat)
    {
        $chat->delete();

        return response()->json(null, 204);
    }

    private function firstOrCreate($meeting)
    {
        $chat = Chat::firstOrCreate([
            'meeting_id' => $meeting->id,
        ],[
            'title_ar'   => $meeting->title_ar,
            'title_en'   => $meeting->title_en,
            'img'        => $meeting->img,
        ]);

        $chat->users()->attach($meeting->users()->get()->pluck('id'));

        return $chat;
    }

}
