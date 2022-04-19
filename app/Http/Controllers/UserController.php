<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Role;
use App\Models\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $users = User::with('role')->paginate();

    return view('user.index', ['users' => $users]);
    }

    public function requests()
    {
    $user = Requests::with('role')->paginate();

    return view('user.request', ['requests' => $user]);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $role = Role::all();
        return view('user.edit')->with([
            'roles' => $role,
            'user'  => $user
        ]);

    }

    public function approve(Requests $requests)
    {
      $user = User::create([
            'employee_id' => $requests->employee_id,
            'company_name' =>$requests->company_name,
            'last_name' => $requests->last_name,
            'first_name' => $requests->first_name,
            'middle_name' => $requests->middle_name,
            'suffix' => $requests->suffix,
            'email' =>$requests->email,
            'password' =>$requests->password,
            'role_request'=> $requests->role_request,
            'role_id' => $requests->role_id,
        ]);

        $res = $user->save();

        if ($res){
            $requests->delete();
            return redirect('list_requests')->withMessage('User approved successfully');
        }else{ return back()->with('fail', 'Something wrong');

    }
}

public function disapprove(Requests $requests)
    {
        $requests->delete();
        return redirect('list_requests')->withMessage('User has been disapproved!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);
        $user_update = User::whereId($user->id)->update([
            'role_id' => $request->role_id,
        ]);
       // dd($user_update);
        //DB::table('users_roles')->where('user_id', $user->id)->delete();

        //$user->assignRole($user->role_id);

        //DB::commit();

        return redirect('list_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
