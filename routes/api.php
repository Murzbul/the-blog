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

Route::post('/login', 'AuthHandler@login')->name('AuthHandler@login');
Route::post('/signup', 'AuthHandler@signUp')->name('AuthHandler@signUp');

Route::get('/blogs', 'BlogHandler@list')->name('BlogHandler@list');
Route::get('/blogs/{blogId}', 'BlogHandler@show')->name('BlogHandler@show');

Route::middleware(\App\Http\Kernel::API)->group(function(){
    Route::post('/blogs', 'BlogHandler@create')->name('BlogHandler@create');
    Route::post('/blogs/{blogId}/change', 'BlogHandler@statusChange')->name('BlogHandler@statusChange');
    Route::put('/blogs/{blogId}', 'BlogHandler@update')->name('BlogHandler@update');
    Route::post('/blogs/{blogId}/comment', 'BlogHandler@comment')->name('BlogHandler@comment');

    Route::post('/roles', 'RoleHandler@create')->name('RoleHandler@create');
    Route::put('/roles/{roleId}', 'RoleHandler@update')->name('RoleHandler@update');
    Route::get('/roles', 'RoleHandler@list')->name('RoleHandler@list');
    Route::get('/roles/{roleId}', 'RoleHandler@show')->name('RoleHandler@show');

    Route::get('/logout', 'AuthHandler@logout')->name('AuthHandler@logout');
    Route::get('/refresh', 'AuthHandler@refresh')->name('AuthHandler@refresh');
    Route::get('/me', 'AuthHandler@me')->name('AuthHandler@me');
});


