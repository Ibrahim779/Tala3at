<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;
use App\Models\Meeting;
use App\Repositories\Meeting\MeetingRepository;

class MeetingController extends Controller
{

    protected $meetingRepository;

    public function __construct(MeetingRepository $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    public function index()
    {
        $meetings = $this->meetingRepository->paginate(self::PAGINATION);

        return view('admin.meetings.index', compact('meetings'));
    }

    public function create()
    {
        $categories = $this->meetingRepository->getData()['categories'];

        $users = $this->meetingRepository->getData()['users'];

        $governorates = $this->meetingRepository->getData()['governorates'];

        $cities = $this->meetingRepository->getData()['cities'];

        return view('admin.meetings.create',
            compact('categories','users', 'governorates', 'cities'));
    }

    public function store(MeetingRequest $request)
    {
        $this->meetingRepository->create($request);

        return redirect()->route('admin.meetings.index');
    }

    public function edit(Meeting $meeting)
    {
        $categories = $this->meetingRepository->getData()['categories'];

        $users = $this->meetingRepository->getData()['users'];

        $governorates = $this->meetingRepository->getData()['governorates'];

        $cities = $this->meetingRepository->getData()['cities'];

        return view('admin.meetings.edit',
            compact('meeting', 'categories','users', 'governorates', 'cities'));
    }

    public function update(Meeting $meeting, MeetingRequest $request)
    {
        $this->meetingRepository->update($meeting, $request);

        return redirect()->route('admin.meetings.index');
    }

    public function destroy(Meeting $meeting)
    {
        $this->meetingRepository->delete($meeting);

        return back();
    }


}
