<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Repositories\Meeting\MeetingRepository;

class MeetingJoinUserController extends Controller
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

    public function __invoke(Meeting $meeting, $userId)
    {
        $this->meetingRepository->joinUser($meeting, $userId);

        return response()->json('you are joined successfully', 201);
    }

}
