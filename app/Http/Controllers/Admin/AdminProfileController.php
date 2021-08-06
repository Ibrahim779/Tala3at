<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminProfileController extends Controller
{

    public function __invoke()
    {
        $admin = auth()->user();

        $roles = Role::select('id', 'name')->get();

        return view('admin.admins.profile', compact('admin', 'roles'));
    }
}
