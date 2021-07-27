<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Repositories\Meeting\MeetingRepository;
use Illuminate\Http\Request;

class CreatorMeetingsController extends Controller
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

    public function __invoke($creator)
    {
        $meetings = $this->meetingRepository->whereCreatedBy($creator)->get();

        return MeetingResource::collection($meetings);
    }
}
