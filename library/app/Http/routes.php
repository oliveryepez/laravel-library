<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    // Authentication routes

    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@login');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');


    //Registration routes

    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::group(['prefix' => 'dashboard'], function(){

        Route::get('/', 'DashboardController@index');

        //User Routes

        Route::get('user/search', 'UserController@search');
        Route::post('user/search', 'UserController@search');
        Route::get('user/add', 'UserController@add');
        Route::post('user/add', 'UserController@add');

        //Roles Routes
        Route::get('role/search', 'RoleController@search');
        Route::post('role/search', 'RoleController@search');
        Route::post('role/edit', 'RoleController@edit');
        Route::post('role/add', 'RoleController@add');
        Route::post('role/delete', 'RoleController@delete');

    });

});


Route::controllers([
    'password' => 'Auth\PasswordController',
]);
