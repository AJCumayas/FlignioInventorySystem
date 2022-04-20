<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
<<<<<<< HEAD
            'name' => 'Administrator',
            'slug' => 'admin',
        ]);

        Role::create([
            'name' => 'Assistant Administrator',
            'slug' => 'sub-admin',
=======
            'name' => 'Super Administrator',
            'slug' => 'admin'
        ]);

        Role::create([
            'name' => 'Assistant Administrator',
            'slug' => 'sub-admin'
        ]);

        Role::create([
            'name' => 'Employee',
            'slug' => 'user'
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb
        ]);

        Role::create([
            'name' => 'Employee',
            'slug' => 'user',
        ]);
    }
}
