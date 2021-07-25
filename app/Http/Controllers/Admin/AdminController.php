<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::paginate(self::PAGINATION);

        return view('admin.admins.index', compact('admins'));
    }

    public function show(Admin $admin)
    {
        $roles = Role::select('id', 'name')->get();

        return view('admin.admins.profile', compact('admin', 'roles'));
    }

    public function profile()
    {
        $admin = auth()->user();

        $roles = Role::select('id', 'name')->get();

        return view('admin.admins.profile', compact('admin', 'roles'));
    }

    public function create()
    {
        $roles = Role::select('id', 'name')->get();

        return view('admin.admins.create', compact('roles'));
    }

    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->except('roles'));

        $admin->syncRoles($request->roles);

        return redirect()->route('admin.admins.index')->withToastSuccess('Added successfully');
    }

    public function update(Admin $admin, AdminRequest $request)
    {
        $admin->update($request->except('roles'));

        $admin->syncRoles($request->roles);

        return back()->withToastSuccess('Updated successfully');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return back()->withToastSuccess('Updated successfully');
    }

}
