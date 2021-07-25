<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $lastMeetings = Meeting::latest()->take(5)->get();

        $lastUsers = User::latest()->take(5)->get();

        $usersCount = User::count();

        $meetingsCount = Meeting::count();

        $categoriesCount = Category::count();

        return view('admin.index', compact('lastMeetings', 'lastUsers', 'usersCount', 'meetingsCount', 'categoriesCount'));
    }
}
