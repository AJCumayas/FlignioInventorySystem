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
        ]);

    }
}
