<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function Permission(Request $request)
    {
    	$admin_permission = Permission::all();
       // dd($admin_permission);
        $sub_permission = Permission::where('slug', 'edit-product')->first();
		$user_permission = Permission::where('slug', 'view-equipment')->first();

		//RoleTableSeeder.php
<<<<<<< HEAD
	//	$admin_role = new Role();
	//	$admin_role->slug = 'admin';
	//	$admin_role->name = 'Super Administrator';
	//	$admin_role->save();
	//	$admin_role->permissions()->attach($admin_permission);

	//	$sub_role = new Role();
	//	$sub_role->slug = 'sub-admin';
	//	$sub_role->name = 'Assistant Administrator';
	//	$sub_role->save();
	//	$sub_role->permissions()->attach($sub_permission);

      //  $user_role = new Role();
		//$user_role->slug = 'user';
	//	$user_role->name = 'Employee';
	//	$user_role->save();
	//	$user_role->permissions()->attach($user_permission);
=======
		$admin_role = new Role();
		$admin_role->slug = 'admin';
		$admin_role->name = 'Super Administrator';
		$admin_role->save();
		$admin_role->permissions()->match($admin_permission);

		$sub_role = new Role();
		$sub_role->slug = 'sub-admin';
		$sub_role->name = 'Assistant Administrator';
		$sub_role->save();
		$sub_role->permissions()->match($sub_permission);

        $user_role = new Role();
		$user_role->slug = 'user';
		$user_role->name = 'Employee';
		$user_role->save();
		$user_role->permissions()->match($user_permission);
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb

	//	$admin_role = Role::where('slug','admin')->first();
	//	$sub_role = Role::where('slug', 'sub-admin')->first();
      //  $user_role = Role::where('slug', 'user')->first();

	//	$assignRoles = new Permission();
	//	$assignRoles->slug = 'assign-roles';
		//$assignRoles->name = 'Assign Roles';
<<<<<<< HEAD
	//	$assignRoles->save();
	//	$assignRoles->roles()->attach($admin_role);
=======
		$assignRoles->save();
		$assignRoles->roles()->match($admin_role);
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb

	//	$editProduct = new Permission();
	//	$editProduct->slug = 'edit-product';
		//$editProduct->name = 'Edit Product';
<<<<<<< HEAD
	//	$editProduct->save();
	//	$editProduct->roles()->attach($sub_role);
=======
		$editProduct->save();
		$editProduct->roles()->match($sub_role);
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb

      //  $viewEquipment = new Permission();
		//$viewEquipment->slug = 'view-equipment';
		///$viewEquipment->name = 'View Equipments';
<<<<<<< HEAD
	//	$viewEquipment->save();
	//	$viewEquipment->roles()->attach($user_role);
=======
		$viewEquipment->save();
		$viewEquipment->roles()->match($user_role);
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb

        $viewEquipment = new Permission();
		$viewEquipment->slug = 'equipment';
		///$viewEquipment->name = 'View Equipments';
		$viewEquipment->save();
		$viewEquipment->roles()->macth($user_role);


        // $admin_role = Role::where('slug','admin')->first();
		// $sub_role = Role::where('slug', 'sub-admin')->first();
        // $user_role = Role::where('slug', 'user')->first();
        // $admin_perm = Permission::where('slug','assign-roles')->first();
        // $sub_perm= Permission::where('slug', 'edit-product')->first();
		// $user_perm = Permission::where('slug', 'view-equipment')->first();

		// $admin = new User();
        // $admin->employee_id = '2022_01';
        // $admin->company_name = 'Fligno';
		// $admin->name = 'Harsukh Makwana';
		// $admin->email = 'harsukh21@gmail.com';
		// $admin->password = bcrypt('987654');
		// $admin->save();
		// $admin->roles()->attach($admin_role);
		// $admin->permissions()->attach($admin_perm);

		// $subAdmin = new User();
        // $subAdmin->employee_id = '2022_02';
        // $subAdmin->company_name = 'Fligno';
		// $subAdmin->name = 'Jitesh Meniya';
		// $subAdmin->email = 'subadmin@gmail.com';
		// $subAdmin->password = bcrypt('123456');
		// $subAdmin->save();
		// $subAdmin->roles()->attach($sub_role);
		// $subAdmin->permissions()->attach($sub_perm);

        // $user = new User();
        // $user->employee_id = '2022_03';
        // $user->company_name = 'Fligno';
		// $user->name = 'Christine Aspe';
		// $user->email = 'user@gmail.com';
		// $user->password = bcrypt('654321');
		// $user->save();
		// $user->roles()->attach($user_role);
		// $user->permissions()->attach($user_perm);


        return view('home');
    }

}
