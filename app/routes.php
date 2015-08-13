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

Route::get('/user/list', array('as' => 'user-list', 'before' => 'auth', 'uses' => 'UserController@listItems'));
Route::get('/user/login', array('as' => 'login-link', 'uses' => 'UserController@login'));
Route::post('/user/login', array('as' => 'login-post', 'before' => 'csrf', 'uses' => 'UserController@doLogin'));
Route::post('/user/registr', array('as' => 'registr-post', 'before' => 'csrf', 'uses' => 'UserController@doRegistr'));
Route::get('/user/registr', array('as' => 'registr', 'uses' => 'UserController@registr'));
Route::get('/user/dashboard', array('as' => 'user-dashboard', 'uses' => 'UserController@dashboard'));
Route::get('/user/logout', array('as' => 'logout', 'uses' => 'UserController@doLogout'));

Route::get('/user/delete/{id?}', array('as' => 'user-delete', 'uses' => 'UserController@delete'));
Route::post('/user/delete', array('as' => 'user-delete-post', 'uses' => 'UserController@doDelete'));
Route::get('/user/edit/{id?}', array('as' => 'user-edit', 'uses' => 'UserController@edit'));
Route::get('/user/add/{id?}', array('as' => 'user-new', 'uses' => 'UserController@edit'));
Route::post('/user/save', array('as' => 'user-save-post', 'uses' => 'UserController@doSave'));

Route::get('/user/change_pass/{id?}', array('as' => 'user-change_pass', 'uses' => 'UserController@change_pass'));
Route::post('/user/change_pass', array('as' => 'user-change_pass-post', 'uses' => 'UserController@doChange_pass'));

Route::get('/vacancy/list', array('as' => 'vacancy-list', 'before' => 'auth','uses' => 'VacancyController@listItems'));
Route::get('/vacancy/delete/{id?}', array('as' => 'vacancy-delete', 'uses' => 'VacancyController@delete'));
Route::post('/vacancy/delete', array('as' => 'vacancy-delete-post', 'uses' => 'VacancyController@doDelete'));
Route::get('/vacancy/edit/{id?}', array('as' => 'vacancy-edit', 'uses' => 'VacancyController@edit'));
Route::get('/vacancy/add/{id?}', array('as' => 'vacancy-new', 'uses' => 'VacancyController@edit'));
Route::post('/vacancy/save', array('as' => 'vacancy-save-post', 'uses' => 'VacancyController@doSave'));

Route::get('/category/list', array('as' => 'category-list', 'before' => 'auth', 'uses' => 'CategoryController@listItems'));
Route::get('/category/delete/{id?}', array('as' => 'category-delete', 'uses' => 'CategoryController@delete'));
Route::post('/category/delete', array('as' => 'category-delete-post', 'uses' => 'CategoryController@doDelete'));
Route::get('/category/edit/{id?}', array('as' => 'category-edit', 'uses' => 'CategoryController@edit'));
Route::get('/category/add/{id?}', array('as' => 'category-new', 'uses' => 'CategoryController@edit'));
Route::post('/category/save', array('as' => 'category-save-post', 'uses' => 'CategoryController@doSave'));

Route::get('/page/list', array('as' => 'page-list', 'before' => 'auth', 'uses' => 'PageController@listItem'));
Route::get('/page/delete/{id?}', array('as' => 'page-delete', 'uses' => 'PageController@delete'));
Route::post('/page/delete', array('as' => 'page-detele-post', 'uses' => 'PageController@doDelete'));
Route::get('/page/edit/{id?}', array('as' => 'page-edit', 'uses' => 'PageController@edit'));
Route::get('/page/add/{id?}', array('as' => 'page-new', 'uses' => 'PageController@edit'));
Route::post('/page/save', array('as' => 'page-save-post', 'uses' => 'PageController@doSave'));
