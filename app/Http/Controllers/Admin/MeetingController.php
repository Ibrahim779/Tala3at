<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Meeting\MeetingRepository;
use App\Repositories\Meeting\MeetingRepositoryInterface;
use Illuminate\Http\Request;

class MeetingController extends Controller
{

    protected $meetingRepository;

    public function __construct(MeetingRepository $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    public function index()
    {
        $meetings = $this->meetingRepository->getWithPagination();

        return view('admin.meetings.index', compact('meetings'));
    }

    public function create()
    {
        return view('admin.meetings.create');
    }

}
