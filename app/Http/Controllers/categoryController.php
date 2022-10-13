<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\categoryTranslations;
use Illuminate\Auth\Events\Validated;

class categoryController extends Controller
{
    public function create(Request $request)
    {

        $category = Category::create($request->all());


        // $request->validate([]);

        $response = [
            'message' => 'category created successfuly successfuly',
            'data' => $category,

        ];

        return response($response,201);

    }

    public function index(Request $request){

        $all_categories = Category::withTranslation()->get();
        $new = $all_categories->makeHidden('translations');

        $response = [
            'message' => 'all categories fetched  successfuly',
            'data' => $new,

        ];
        return response($response,201);

    }

    public function show($id){

        $category = Category::find($id);
        if(isset($category)){
            $category->makeHidden('translations');
            $msg = 'one category fetched';

        }
        else{
            $msg = 'we do not have this id ';
            $category = [];
        }


        $response = [
            'message' => $msg,
            'data' => $category,

        ];
        return response($response,201);


    }
    //
}
