<?php

namespace App\Http\Controllers;

use App\Models\exam;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ExamController extends Controller
{

    public function create(Request $request){


        $exam = exam::create($request->all());




        $response = [
            'message' => 'exam created successfuly successfuly',
            'data' => $exam,

        ];

        return response($response,201);

    }

    public function exams(Request $request){

        if(isset($request->category_id) && $request->user_id){

            $exams = exam::where([
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,

            ])->get();

            $response = [
                'message' => count($exams) . 'exams fetched',
                'data' => $exams,

            ];

            return response($response,201);



        }elseif(isset($request->category_id)){

            $exams = exam::where([

                'category_id' => $request->category_id,

            ])->get();

            $response = [
                'message' => count($exams) . 'exams fetched',
                'data' => $exams,

            ];

            return response($response,201);



        }elseif(isset($request->user_id)){

            $exams = exam::where([
                'user_id' => $request->user_id,


            ])->get();

            $response = [
                'message' => count($exams) . 'exams fetched',
                'data' => $exams,

            ];

            return response($response,201);
        }else{
            return response('هات اي دي يا عم');
        }




    }


    //
}
