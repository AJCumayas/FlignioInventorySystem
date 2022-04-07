<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [


        ];
        $assignRoles = new Permission();
        $assignRoles->name = 'Assign Roles';
		$assignRoles->slug = 'assign-roles';
		$assignRoles->save();
		//$assignRoles->roles()->attach($admin_role);

		$editProduct = new Permission();
        $editProduct->name = 'Edit Product';
		$editProduct->slug = 'edit-product';
		$editProduct->save();
		//$editProduct->roles()->attach($sub_role);

        $viewEquipment = new Permission();
        $viewEquipment->name = 'View Equipments';
		$viewEquipment->slug = 'view-equipment';
		$viewEquipment->save();
		//$viewEquipment->roles()->attach($user_role);
    }
}
