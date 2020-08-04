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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories','Category\CategoryController@index');
Route::get('/categories/{id}','Category\CategoryController@show');
Route::post('/categories','Category\CategoryController@create');
Route::put('/categories/{id}','Category\CategoryController@update');
Route::delete('/categories/{id}','Category\CategoryController@delete');
Route::get('/posts','Post\PostController@index');

