<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  //  $users = user()->paginate(10);
    $users = User::with('role')->paginate(10);
    return view('user.index', ['users' => $users]);
    // return view('user.index',['users'=> DB::table('users', 'roles')->paginate(10)]);
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
    public function edit($id)
    {

        if(!$user =  User::whereId($id)->first()){

            return back()->with('error','User Not Found');
        }

        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'role_request' => 'exists:roles,name',
        ]);
        $user_update = User::whereId($user->id)->update([
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'role_request' => $request->role_request,
        ]);

        DB::table('users_roles')->where('user_id', $user->id)->delete();

        $user->assignRole($user->role_request);

        DB::commit();
        return redirect('edit', ['user' => $user->id])->route('user.index')->with('success', 'User Updated Success');
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
