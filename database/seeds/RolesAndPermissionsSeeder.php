<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        
        /* Create permissions */

        Permission::create(['name' => 'administer roles & permissions']);
        Permission::create(['name' => 'manage user']);

        Permission::create(['name' => 'publish article']);

        Permission::create(['name' => 'manage category']);

        Permission::create(['name' => 'manage user & category']);

      
        /* Create roles and assign existing permissions */

        $permissions = Permission::all();

        $role = Role::create(['name' => 'admin']);
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission->name);
        }

        // PRESIDENT
        $role = Role::create(['name' => 'president']);
        $role->givePermissionTo('publish article');
        $role->givePermissionTo('manage category');
        $role->givePermissionTo('manage user & category');

        // MEMBER
        $role = Role::create(['name' => 'member']);
        $role->givePermissionTo('publish article');
    }
}