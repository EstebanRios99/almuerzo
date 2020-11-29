<?php

use Illuminate\Http\Request;

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


Route::group(['middleware' => ['cors']], function () {

    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate');

    Route::group(['middleware' => ['jwt.verify']], function() {

        Route::get('user', 'UserController@getAuthenticatedUser');
        Route::post('logout', 'UserController@logout');

        //employs
        Route::get('employs', 'EmployController@index');
        Route::get('employs/{employ}', 'EmployController@show');
        Route::get('search/employ/{identification}', 'EmployController@searchEmploy');
        Route::post('employs', 'EmployController@store');
        Route::put('employs/{employ}', 'EmployController@update');
        Route::delete('employs/{employ}', 'EmployController@delete');

        //registers
        Route::get('employs/{identification}/registers','EmployController@registersByEmploy');
        Route::get('registers', 'RegisterController@index');
        Route::get('registers/{register}', 'RegisterController@show');
        Route::post('registers', 'RegisterController@store');
        Route::put('registers/{register}', 'RegisterController@update');
        Route::delete('registers/{register}', 'RegisterController@delete');
    });
});
