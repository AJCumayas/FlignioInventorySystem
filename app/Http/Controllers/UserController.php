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
    $users = User::with('role')->paginate();
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
    public function edit(User $user)
    {

        $role = Role::all();
        return view('user.edit')->with([
            'roles' => $role,
            'user'  => $user
        ]);
    //     if(!$user =  User::whereId($id)->first()){

    //         return back()->with('error','User Not Found');
    //     }
    //     $users = User::whereId($id)->first();
    //     $roles = DB::select('select * from roles');
    //    // dd($roles);
    //     return view('user.edit', ['user' => $users, 'role' => $roles]);

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
