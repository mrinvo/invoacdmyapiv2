<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Response;


class authController extends Controller
{
    //
    public function register(Request $request){
        $fields = $request->validate([

            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'user_type' => 'required',
            'password' => 'required|string|confirmed|'

        ]);





        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'user_type' => $fields['user_type'],
            'password' => bcrypt($fields['password'])
        ]);


        $user->attachRole('teacher');
        $user->syncPermissions($request->permissions);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [

            'Message' => 'registerd successfuly',
            'data'=> $user,
            'permissions' => $request->permissions,
            'token' => $token,


        ];


        return response($response,201);
    }

    public function login(Request $request){
        $fields = $request->validate([


            'email' => 'required|string|',
            'password' => 'required|string|'

        ]);

        $user = User::where('email',$fields['email'])->first();
        //check email
        $token = $user->createToken('myapptoken')->plainTextToken;



        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)){

            return response([
                'message' => 'wrong email or password',
            ],401);

        }

        $permissions = $user->allPermissions();

        $response = [
            'message' => 'logged in successfuly',
            'data' => $user,
            'token' => $token,
            'permission' => $permissions->pluck('name'),

        ];

        return response($response,201);
    }


    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return [
            'messege' =>'Logged out'
        ];
    }
}

