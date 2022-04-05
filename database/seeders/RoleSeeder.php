<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Permission::firstOrCreate(['slug'=>'write-a-post']);
    Permission::firstOrCreate(['slug'=>'edit-a-post']);
    Permission::firstOrCreate(['slug'=>'delete-a-post']);
    Permission::firstOrCreate(['slug'=>'view-a-post']);

    $admin_role = new Role();
    $admin_role->slug = 'admin';
    $admin_role->name = 'Super Administrator';
    $admin_role->save();
    //$admin_role->permissions()->attach($admin_permission);

    $sub_role = new Role();
    $sub_role->slug = 'sub-admin';
    $sub_role->name = 'Assistant Administrator';
    $sub_role->save();
    //$sub_role->permissions()->attach($sub_permission);

    $user_role = new Role();
    $user_role->slug = 'user';
    $user_role->name = 'Employee';
    $user_role->save();
    //$user_role->permissions()->attach($user_permission);


    }
}
