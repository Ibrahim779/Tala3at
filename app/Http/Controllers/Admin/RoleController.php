<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(self::PAGINATION);

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::select('id', 'name')->get();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $this->saveData(new Role, $request);
        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::select('id', 'name')->get();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role, RoleRequest $request)
    {
        $this->saveData($role, $request);
        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }

    private function saveData(Role $role, RoleRequest $request)
    {
        $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->syncPermissions($request->permissions);
        $role->save();
    }
}
