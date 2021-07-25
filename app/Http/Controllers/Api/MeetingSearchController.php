<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $meetings = Meeting::whereCategoryId($request->category_id)
            ->orWhere('date', $request->date)
            ->orWhere('city_id', $request->city_id)
            ->orWhere('attendance_count', $request->attendance_count)
            ->get();

        return MeetingResource::collection($meetings);
    }
}
