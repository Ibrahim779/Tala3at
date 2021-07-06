<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use App\Repositories\Meeting\MeetingRepository;
use Illuminate\Http\Request;

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
        return MeetingResource::collection($this->meetingRepository->all());
    }

    public function store(MeetingRequest $request)
    {
        $meeting = $this->meetingRepository->create($request);

        return new MeetingResource($meeting);
    }

    public function show(Meeting $meeting)
    {
        return new MeetingResource($meeting);
    }

    public function update(MeetingRequest $request, Meeting $meeting)
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
