<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\FreeEmailValidation;
use Illuminate\Support\Facades\Hash;
use App\Permissions\HasPermissionsTrait;
use App\Models\User;
use App\Models\Requests;
use App\Models\Permission;
use App\Models\Role;
use Session;
use DB;

class AuthController extends Controller
{
    public function loginView(Request $request)
    {
<<<<<<< HEAD
        //If user tries to log in:

        $dbCheck = DB::select('select * from users where id = ?', [1]);
        if ($dbCheck == null) //If db is empty
        {
            return view("auth.firstPage"); //warning to register as superadmin

        }
        else{

            return view("auth.loginPage");
        }
    }

    public function registration_fcheck()
    {

        //user tries to register
        $role = Role::all();
        $dbCheck = DB::select('select * from users where id = ?', [1]);
       if ($dbCheck == null) //DB is empty
        {
            return view("auth.firstPage"); //Register automatically s superadmin
        }
        else{

            return view("auth.register")->with(['roles' => $role]);
        }
=======
        if(Session::has('loginId')){
        return view("auth.loginPage");
        }else{
            return view("auth.loginPage");
        }
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb
    }

    public function registration()
    {
       $role = Role::all();
       return view("auth.register")->with(['roles' => $role]);
    }

<<<<<<< HEAD

=======
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb
    public function registerUser(Request $request)
    {
        //validate the data inputted
        $request->validate([
            'employee_id' => 'required|unique:users',
            'company_name' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'suffix' => '',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
<<<<<<< HEAD
            'confirm_password' => 'required|same:password|min:5',
=======
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb
            'role_request' => 'exists:roles,name',
        ]);

                // database check from user table
            $dbCheck = DB::select('select * from users where id = ?', [1]);

              //first register would be assigned role as admin
            if ($dbCheck == null) {

            $admin_role = Role::where('id','1')->first();
            //create acocunt to database
            $user = User::create([
<<<<<<< HEAD
                'employee_id' => $request['employee_id'],
                'company_name' => $request['company_name'],
                'last_name' => $request['last_name'],
                'first_name' => $request['first_name'],
                'middle_name' => $request['middle_name'],
                'suffix' => $request['suffix'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role_request'=> $request->role_request,
                'role_id' => $admin_role->id
            ]);

            $res = $user->save();//saving new model
                if ($res){
                    return redirect('admin_page');
=======
            'employee_id' => $request['employee_id'],
            'company_name' => $request['company_name'],
            'last_name' => $request['last_name'],
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'suffix' => $request['suffix'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_request'=> $request->role_request,
            'role_id' => $admin_role->id
            ]);

            //assign role to admin
            // $admin_perm = Permission::where('slug', 'view-equipment')->first();
            // $user->permissions()->attach($admin_perm);
            //$user->role()->attach($admin_role);
            //dd($admin_role);
            $res = $user->save();//saving new model
                if ($res){
                    //return $role = "Admin";
                    return redirect('admin_page')->with('Sucess', 'Registered Successfully');
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb
                }else{ return back()->with('fail', 'Something wrong');
            }
        }

        else {
            //once admin was already registered all new accounts will be assigned as user role
            $user_role = Role::where('slug','user')->first();
            $user = Requests::create([
                'employee_id' => $request['employee_id'],
                'company_name' => $request['company_name'],
                'last_name' => $request['last_name'],
                'first_name' => $request['first_name'],
                'middle_name' => $request['middle_name'],
                'suffix' => $request['suffix'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role_request'=> $request->role_request,
                'role_id' => $user_role->id
                ]);

            $res = $user->save();
            if ($res){
<<<<<<< HEAD
                return redirect('approval');
=======
                //return $role = "user";
                return redirect('login_user')->with('success', 'Registered Successfully');
>>>>>>> 1d0aa242f5aab2c731fca08fa0362cb1845199cb
            }else{ return back()->with('fail', 'Something wrong');
        }}


    }//funcion end

    public function approval()
{
     $role = Role::all();
     $dbCheck = DB::select('select * from users where id = ?', [1]);
       if ($dbCheck == null)
       {
          return redirect('/admin_page');
       }
         else{
           return view("auth.approval");
         }
}

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
}
