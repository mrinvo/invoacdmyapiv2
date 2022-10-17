<?php

namespace App\Http\Controllers;

use App\Models\section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function create(Request $request){


        $section = section::create($request->all());




        $response = [
            'message' => 'section created successfuly successfuly',
            'data' => $section,

        ];

        return response($response,201);

    }

    public function show($id){

        $sections = section::where('exam_id',$id)->get();

        $response = [
            'message' => count($sections) . 'sections created successfuly successfuly',
            'data' => $sections,

        ];

        return response($response,201);

    }
    //
}
