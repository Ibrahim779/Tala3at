<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use App\Repositories\Meeting\MeetingRepository;
use Illuminate\Http\Request;

class MeetingUserController extends Controller
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


    public function index()
    {
        //todo
        $meetings = $this->meetingRepository->userMeetings(auth()->id())->get();

        return MeetingResource::collection($meetings);
    }

    public function getMeetingsCreatedByUser()
    {
        //todo
        $meetings = $this->meetingRepository->whereCreatedBy(auth()->id())->get();

        return MeetingResource::collection($meetings);
    }

    public function joinUser(Meeting $meeting, $userId)
    {
        $this->meetingRepository->joinUser($meeting, $userId);

        return response('you are joined successfully', 201);
    }
}
