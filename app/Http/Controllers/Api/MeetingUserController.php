<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingUserController extends Controller
{

    public function index()
    {
        $meetings = Meeting::userMeetings(auth()->id())->get();

        return MeetingResource::collection($meetings);
    }

    public function getMeetingsCreatedByUser()
    {
        $meetings = Meeting::whereCreatedBy(auth()->id())->get();

        return MeetingResource::collection($meetings);
    }
}
