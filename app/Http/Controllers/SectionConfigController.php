<?php

namespace App\Http\Controllers;

use App\Models\section;
use App\Models\section_config;
use Illuminate\Http\Request;

class SectionConfigController extends Controller
{

    public function create(Request $request){


        $config = section_config::create($request->all());




        $response = [
            'message' => 'config created successfuly successfuly',
            'data' => $config,

        ];

        return response($response,201);

    }

    public function show($id){

        $config = section_config::where('section_id',$id)->get();




        $response = [
            'message' => 'config fetched successfuly successfuly',
            'data' => $config,

        ];

        return response($response,201);

    }








    //
}
