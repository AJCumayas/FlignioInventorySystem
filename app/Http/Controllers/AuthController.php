<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\FreeEmailValidation;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
        return view("auth.register");
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|unique:users',
            'company_name' => 'required|in:Fligno,fligno',
            'name' => 'required',
            'email' => 'required|email|unique:users',new FreeEmailValidation(),
            'password' => 'required|min:5',
        ]);


        $dbCheck = DB::select('select * from users where id = ?', [1]);
        $user = new User();
        $user->employee_id = $request->employee_id;
        $user->company_name = $request->company_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($dbCheck == null) {
        // $user = new User();
        // $user->employee_id = $request->employee_id;
        // $user->company_name = $request->company_name;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $res = $user->save();
            if ($res){
                //return $role = "Admin";
                return view('admin.dashboard');
            }else{ return back()->with('fail', 'Something wrong');
         }
        }else {
            $user = new User();~
            $user->employee_id = $request->employee_id;
            $user->company_name = $request->company_name;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $res = $user->save();
            if ($res){
                //return $role = "user";
                return view('user.dashboard');
            }else{ return back()->with('fail', 'Something wrong');
        }}


    }//funcion end


    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if (Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
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

   protected function authenticated(Request $request, $user)
   {
    $uid =  $user->id;
    $role= \DB::table('users_roles')
        ->where('users_roles.uid','=',$uid)
        ->join('roles', 'users_roles.rid', '=', 'roles.rid')
        ->select('roles.name as name')
        ->first();
    if ($role->name=='admin') {
        return redirect('/admindashbaord');
    } elseif($role->name=='manager') {
        return redirect('/managerdashbaord');
    }
   }

}
