<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'tenant-auth'] , function(){
    Route::post('login',[\App\Http\Controllers\Api\Auth\LoginController::class,'login']);
    Route::post('logout',[\App\Http\Controllers\Api\Auth\LoginController::class,'logout']);

    Route::post('register',[\App\Http\Controllers\Api\Auth\RegisterController::class,'register']);

    Route::get('/products',[\App\Http\Controllers\Api\Website\ProductController::class,'index']);
    Route::get('/products/{id}',[\App\Http\Controllers\Api\Website\ProductController::class,'show']);
});

Route::group(['prefix' => 'admin','middleware' => 'auth:api'],function(){

});
