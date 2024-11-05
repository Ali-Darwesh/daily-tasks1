<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // permission
            // on users
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
            // on posts
        Permission::create(['name' => 'create-tasks']);
        Permission::create(['name' => 'edit-tasks']);
        Permission::create(['name' => 'update-task-status']);
        Permission::create(['name' => 'delete-posts']);

        // role
        $adminRole = Role::create(['name' => 'Admin']);
        
        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-tasks',
            'edit-tasks',
            'update-task-status',
            'delete-tasks',
        ]);
    }
}