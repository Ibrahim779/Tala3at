<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use App\Repositories\Meeting\MeetingRepository;
use Illuminate\Http\Request;

class UserMeetingsController extends Controller
{

    private $meetingRepository;

    /**
     * MeetingController constructor.
     * @param $meetingRepository
     */
    public function __construct(MeetingRepository $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }


    public function index($user)
    {
        $meetings = $this->meetingRepository->userMeetings($user)->get();

        return MeetingResource::collection($meetings);
    }
}
