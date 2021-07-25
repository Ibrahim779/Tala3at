<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Meeting\StoreMeetingRequest;
use App\Http\Requests\Meeting\UpdateMeetingRequest;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use App\Repositories\Meeting\MeetingRepository;

class MeetingController extends Controller
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
        return MeetingResource::collection($this->meetingRepository->get());
    }

    public function store(StoreMeetingRequest $request)
    {
        $meeting = $this->meetingRepository->create($request);

        $this->meetingRepository->sendNewMeetingNotification($meeting);

        return new MeetingResource($meeting);
    }

    public function show(Meeting $meeting)
    {
        return new MeetingResource($meeting);
    }

    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        $meeting = $this->meetingRepository->update($meeting, $request);

        return new MeetingResource($meeting);
    }

    public function destroy(Meeting $meeting)
    {
        $this->meetingRepository->delete($meeting);

        return response()->json(null, 204);
    }

}
