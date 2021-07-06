<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingSearchController extends Controller
{
    public function search(Request $request)
    {
        $meetings = Meeting::whereCategoryId($request->category_id)
            ->whereDate($request->date)
            ->whereCityId($request->city_id)
            ->whereAttendanceCount($request->attandance_count)
            ->get();

        return MeetingResource::collection($meetings);
    }
}
