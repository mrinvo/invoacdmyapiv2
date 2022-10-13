<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\PermissionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['lang']] , function () {
    // public
    Route::post('/login',[authController::class,'login']);
    Route::post('/register',[authController::class,'register']);

    Route::controller(categoryController::class)->group(function(){

        Route::post('/category/create','create');
        Route::get('/category/index','index');
        Route::get('/category/show/{id}','show');


    });
    Route::get('/permissions/user/{id}',[PermissionsController::class,'user']);

    //protected
    Route::group(['middleware' => ['auth:sanctum']] , function () {


        Route::controller(categoryController::class)->group(function(){

            Route::post('/category/create','create');


        });
        Route::get('/permissions/index',[PermissionsController::class,'index']);

        Route::post('/logout',[authController::class,'logout']);




        // return $request->user();
    });

    });

