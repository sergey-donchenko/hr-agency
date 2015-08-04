<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));

Route::get('/user/login', array('as' => 'login-link', 'uses' => 'UserController@login'));
Route::get('/user/dashboard', array('as' => 'user-dashboard', 'uses' => 'UserController@dashboard'));
Route::get('/user/logout', array('as' => 'logout', 'uses' => 'UserController@doLogout'));

Route::post('/user/login', array('as' => 'login-post', 'before' => 'csrf', 'uses' => 'UserController@doLogin'));
Route::post('/user/registr', array('as' => 'registr-post', 'before' => 'csrf', 'uses' => 'UserController@doRegistr'));
Route::get('/user/registr', array('as' => 'registr', 'uses' => 'UserController@registr'));
