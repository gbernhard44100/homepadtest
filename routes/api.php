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

Route::post('/users', 'UserController@register');


Route::post('/login', 'OAuthController@login');

/**
 * Particularly usefull when rerouting by the Auth:API Middleware
 */
Route::get('/login', 'OAuthController@notifyInvalidToken')->name('login');



Route::middleware('auth:api')->group(function () {
    Route::get('/packages', 'PackageController@index');
});
