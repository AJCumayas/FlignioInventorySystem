<?php
namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class ApiAuthenController
{
    public function register(Request $request)
    {
        $request->validate(
        ['employee_id' => 'required',
        'company_name' => 'required',
        'name' => 'required',
        'email' => 'required|max:191',
        'password' => 'required',]);

            $user = User::create([
                'employee_id' =>$request->employee_id,
                'company_name' =>$request->company_name,
                'name' => $request->name,
                'email' =>$request->email,
                'password' =>Hash::make($request->password),
            ]);

            $token = $user->createToken($user->email.'_Token')->plainTextToken;

            return response()->json([
                'status'=>200,
                'name'=>$user->name,
                'token'=>$token,
                'message'=>'Registered Successfully',
            ]);

    }
    public function login(Request $request)
    {
        // $validator = Validator::make($request->all(),
        // [
        //     'email' => 'required|max:191',
        //    'password' => 'required',
        // ]);

        $request->validate(['email' => 'required|max:191',
        'password' => 'required',]);
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password))
        {
            return response()->json([
                'status' => 401,
                'message'=>'Invalid Credentials',
            ]);
        }
        else
        {
           $token = $user->createToken($user->email.'_Token')->plainTextToken;

            return response()->json([
                'status'=>200,
                'email'=>$user->email,
                'token'=>$token,
                'message'=>'Logged In Successfully',
            ]);
        }
        // if($validator->fails())
        // {
        //     return response()->json([
        //         'validation_errors'->$validator->messages(),
        //     ]);
        // }
        // else
        // {
        //     $user = User::where('email', $request->email)->first();

        //     if (! $user || ! Hash::check($request->password, $user->password))
        //     {
        //         return response()->json([
        //             'status' => 401,
        //             'message'=>'Invalid Credentials',
        //         ]);
        //     }
        //     else
        //     {
        //        $token = $user->createToken($user->email.'_Token')->plainTextToken;

        //         return response()->json([
        //             'status'=>200,
        //             'email'=>$user->email,
        //             'token'=>$token,
        //             'message'=>'Logged In Successfully',
        //         ]);
        //     }
        // }
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Logged Out Successfully'
        ]);
    }



}
