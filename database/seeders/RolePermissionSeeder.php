<?php

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
        Permission::create(['name' => 'create-posts']);
        Permission::create(['name' => 'edit-posts']);
        Permission::create(['name' => 'delete-posts']);

        // role
        $adminRole = Role::create(['name' => 'Admin']);
        
        $adminRole->givePermissionTo([
            'create-users',
            'delete-users',
            'create-posts',
            'edit-posts',
            'delete-posts',
        ]);
    }
}