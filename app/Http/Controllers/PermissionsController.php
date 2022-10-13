<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    public function index(){
        $all = Permission::all();
        $response = [
            'message' => 'all permissions fetched',
            'data' => $all,

        ];
        return response($response,201);
    }

    public function user($id){

        $user = User::find($id);
        if(isset($user)){
            $msg = 'all user permissions fetched';
            $data = $user->allPermissions();

        }else{
            $msg = 'we do not have this id ';
            $data = [];
        }



        $response = [
            'message' => $msg,
            'data' => $data,

        ];
        return response($response,201);

    }
    //
}
