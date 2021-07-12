<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Services\Permission\GeneratePermissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard', 'guard_name' => 'admin']);
        GeneratePermissions::generatePermissions();

        $role = Role::create(['name' => 'super-admin', 'guard_name' => 'admin']);
        $role->syncPermissions(Permission::all()->pluck('name'));
        // gets all permissions via Gate::before rule; see AuthServiceProvide

        // create demo users
        $admin = Admin::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@admin.com',
        ]);
        $admin->assignRole($role);
    }
}
