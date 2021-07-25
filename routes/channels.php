<?php

use App\Models\AdminChat;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chats.{chatId}', function () {
    return true;
});

Broadcast::channel('admin.chats.{chatId}', function ($chatId) {
    $chat = AdminChat::find($chatId);
    if ($chat->from_admin_id == auth()->id() || $chat->to_admin_id == auth()->id())
        return true;
    return false;
});
