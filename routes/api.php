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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('payrolls', 'PayrollController@index');
Route::get('payrolls/{payroll}', 'PayrollController@show');
Route::post('payrolls', 'PayrollController@store');
Route::put('payrolls/{payroll}', 'PayrollController@update');
Route::delete('payrolls/{payroll}', 'PayrollController@delete');

Route::get('registers', 'RegisterLunchController@index');
Route::get('registers/{register}', 'RegisterLunchController@show');
Route::post('registers', 'RegisterLunchController@store');
Route::put('registers/{register}', 'RegisterLunchController@update');
Route::delete('registers/{register}', 'RegisterLunchController@delete');
