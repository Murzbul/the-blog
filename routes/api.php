<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/blogs', 'BlogHandler@create')->name('BlogHandler@create');
Route::put('/blogs/{blogId}', 'BlogHandler@update')->name('BlogHandler@update');
Route::get('/blogs', 'BlogHandler@list')->name('BlogHandler@list');
Route::get('/blogs/{blogId}', 'BlogHandler@show')->name('BlogHandler@show');
