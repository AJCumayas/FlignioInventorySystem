<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-create',
            'role-edit',
            'role-list',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
        ];

        foreach($permissions as $permission){
            Permission::create([
                'slug' => $permission
            ]);
        }

        // All Permissions
        $permission_saved = Permission::pluck('id')->toArray();

        // Give Role Admin All Access
        $role = Role::whereId(1)->first();
        //$role->permissions()->match($permissions);

        // Admin Role Sync Permission
        $user = User::where('role_id', 1)->first();
      //  $user->permissions()->match($permissions);
    }
}
