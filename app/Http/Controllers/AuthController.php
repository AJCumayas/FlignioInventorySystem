<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\FreeEmailValidation;
use Illuminate\Support\Facades\Hash;
use App\Permissions\HasPermissionsTrait;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use Session;
use DB;

class AuthController extends Controller
{
    public function loginView()
    {
        return view("auth.loginPage");
    }

    public function registration()
    {
        $role = Role::all();
        return view("auth.register")->with(['roles' => $role]);
    }
    public function registerUser(Request $request)
    {//validate the data inputted
        $request->validate([
            'employee_id' => 'required|unique:users',
            'company_name' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'role_request' => 'exists:roles,id',
        ]);

        // database check from user table
        $dbCheck = DB::select('select * from users where id = ?', [1]);
        //first register would be assigned role as admin
        if ($dbCheck == null) {

            $admin_role = Role::where('id','1')->first();
            //create acocunt to database
            $user = User::create([
            'employee_id' => $request['employee_id'],
            'company_name' => $request['company_name'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_request'=> $request['role_request'],
            'role_id' => $admin_role->id
            ]);

            //assign role to admin

            $admin_perm = Permission::where('slug', 'view-equipment')->first();
            $user->permissions()->attach($admin_perm);
            //$user->role()->attach($admin_role);
            //dd($admin_role);
            $res = $user->save();//saving new model
                if ($res){
                    //return $role = "Admin";
                    return redirect('admin_page');
                }else{ return back()->with('fail', 'Something wrong');
            }
        }else {
            //once admin was already registered all new accounts will be assigned as user role
            $user_role = Role::where('slug','user')->first();
            $user = User::create([
                'employee_id' => $request['employee_id'],
                'company_name' => $request['company_name'],
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role_request'=> $request['role_request'],
                'role_id' => $user_role->id,
                ]);
                //assign role

            //$user->role()->attach($user_role);
                //dd($user->roles()->attach($admin_role));
                //dd($user);
            $res = $user->save();
            if ($res){
                //return $role = "user";
                return redirect('users_page');
            }else{ return back()->with('fail', 'Something wrong');
        }}


    }//funcion end


    public function loginUser(Request $request)
    {//validate the credentials inputted
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $user = User::where('email', '=', $request->email)->first(); //campare the email inputted from data stored in the database

        if($user){
            if (Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return $this->authenticated($request, $user);
              //  return redirect('dashboard');
            }else {
                return back() ->with('fail' ,'Password not matches.');
            }
        }else {
            return back() ->with('fail', 'This email is not registered.');
        }
    }
    public function dashboard()
    {
       return view('home');
    }

    public function logoutUser()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login_user');
        }
    }
    public function adminView()
        {
            return view('admin.dashboard');
        }
    public function subAdminView()
    {
        return view('admin.subadmin.dashboard');
    }
    public function userView()
    {
        return view('user.dashboard');
    }
//auuthenticate users role from the credentials inputted in the login page
   protected function authenticated(Request $request, $user)
   {
    $uid =  $user->id;
    $role= \DB::table('users')
        ->where('users.id','=',$uid)
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('roles.slug')
        ->first();
       // dd($role);
    if ($role->slug=='admin') {
        return redirect('/admin_page');
    } elseif($role->slug=='sub-admin') {
        return redirect('/sub_admin_page');
    }else{
        return redirect('/users_page');
    }
   }
//    $role= \DB::table('users_roles')
//    ->where('user_id', $uid)
//    ->join('roles', 'role_id', '=', 'roles.id')
//    ->select('role_id')
//    ->first();
//   //dd($role);
// if ($role->slug=='admin') {
//    return redirect('/admin_page');
// } elseif($role->slug=='user') {
//    return redirect('/users_page');
// }
// }
}
