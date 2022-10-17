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

        $all_categories = Category::where('parent_id',null)->withTranslation()->get();
        $new = $all_categories->makeHidden('translations');

        $response = [
            'message' => 'all parent categories fetched  successfuly',
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

    public function childs($id){

        $childs = Category::where('parent_id',$id)->withTranslation()->get();
        if(isset($childs)){
            $childs->makeHidden('translations');
            $msg = 'all childs fetched';
        }else{
            $msg = 'this id has no childs';
            $childs = null;
        }


        $response = [
            'message' => $msg,
            'data' => $childs,

        ];
        return response($response,201);

    }

    public function haschilds($id){

        $childs = Category::where('parent_id',$id)->get();
        $count = count($childs);

        if($count > 0){
            $has = true;

            $msg = 'this parent has ' . $count . 'childs';
        }else{
            $has = false;
            $count = 0;
            $msg = 'this category has no childs';
            $childs = [];
        }

        $response = [
            'message' => $msg,
            'has childs' => $has,
            'number of childs' => $count,
            'data' => $childs,

        ];
        return response($response,201);

    }
    //
}
