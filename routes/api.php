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

// API Group Routes
Route::group(['prefix' => 'v1'], function () {

    /*
     * Guest area
     */

    Route::post('auth/login', 'AuthController@login');
    Route::post('auth/register', 'AuthController@register');


    /*
     * Authenticated area
     */

    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('user/me', 'UserController@me');
        Route::resource('user', 'UserController');

    });

});
