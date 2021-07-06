<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetingResource;
use App\Models\Category;
use App\Models\Meeting;
use Illuminate\Http\Request;

class CategoryMeetingController extends Controller
{

    public function index(Category $category)
    {
        return MeetingResource::collection(Meeting::whereCategoryId($category->id)->get());
    }

}
