<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;
use App\Models\Meeting;
use App\Repositories\Meeting\MeetingRepository;

class MeetingController extends Controller
{

    protected $meetingRepository;

    private $categories, $users, $governorates, $cities, $attendancesCountArray;

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
        $this->setData();

        $categories = $this->categories;

        $users = $this->users;

        $governorates = $this->governorates;

        $cities = $this->cities;

        $attendancesCountArray = $this->attendancesCountArray;

        return view('admin.meetings.create',
            compact('categories','users', 'governorates', 'cities', 'attendancesCountArray'));
    }

    public function store(MeetingRequest $request)
    {
        $this->meetingRepository->create($request);

        return redirect()->route('admin.meetings.index')->withToastSuccess('Added successfully');
    }

    public function edit(Meeting $meeting)
    {
        $this->setData();

        $categories = $this->categories;

        $users = $this->users;

        $governorates = $this->governorates;

        $cities = $this->cities;

        $attendancesCountArray = $this->attendancesCountArray;

        return view('admin.meetings.edit',
            compact('meeting', 'categories','users', 'governorates', 'cities', 'attendancesCountArray'));
    }

    public function update(Meeting $meeting, MeetingRequest $request)
    {
        $this->meetingRepository->update($meeting, $request);

        return redirect()->route('admin.meetings.index')->withToastSuccess('Updated successfully');
    }

    public function destroy(Meeting $meeting)
    {
        $this->meetingRepository->delete($meeting);

        return back()->withToastSuccess('Updated successfully');
    }

    public function setData()
    {
        $this->categories = $this->meetingRepository->getData()['categories'];

        $this->users = $this->meetingRepository->getData()['users'];

        $this->governorates = $this->meetingRepository->getData()['governorates'];

        $this->cities = $this->meetingRepository->getData()['cities'];

        $this->attendancesCountArray = $this->meetingRepository->getData()['attendancesCountArray'];
    }


}
