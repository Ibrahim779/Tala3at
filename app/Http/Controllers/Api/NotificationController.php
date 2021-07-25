<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{

    public function index()
    {
         return NotificationResource::collection(auth()->user()->notifications()->get());
    }

    public function destroy($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);

        $notification->delete();

        return response()->json(null, 204);
    }
}
