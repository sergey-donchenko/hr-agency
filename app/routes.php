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

/*
|--------------------------------------------------------------------------
| Log on home and login
|--------------------------------------------------------------------------
*/
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));
Route::get('/login', array('as' => 'login-link', 'uses' => 'UserController@login'));

/*
|--------------------------------------------------------------------------
| Entrance to the user list, login, registration, dashboard and logout
|--------------------------------------------------------------------------
*/
Route::get('/user/list', array('as' => 'user-list', 'before' => 'auth', 'uses' => 'UserController@listItems'));
Route::get('/user/login', array('as' => 'login-link', 'uses' => 'UserController@login'));
Route::post('/user/login', array('as' => 'login-post', 'before' => 'csrf', 'uses' => 'UserController@doLogin'));
Route::get('/user/registr', array('as' => 'registr', 'uses' => 'UserController@registr'));
Route::post('/user/registr', array('as' => 'registr-post', 'before' => 'csrf', 'uses' => 'UserController@doRegistr'));
Route::get('/user/dashboard', array('as' => 'user-dashboard', 'uses' => 'UserController@dashboard'));
Route::get('/user/logout', array('as' => 'logout', 'uses' => 'UserController@doLogout'));

/*
|--------------------------------------------------------------------------
| Log on user-defined functions
|--------------------------------------------------------------------------
*/
Route::get('/user/delete/{id?}', array('as' => 'user-delete', 'uses' => 'UserController@delete'));
Route::post('/user/delete', array('as' => 'user-delete-post', 'uses' => 'UserController@doDelete'));
Route::get('/user/edit/{id?}', array('as' => 'user-edit', 'uses' => 'UserController@edit'));
Route::get('/user/add/{id?}', array('as' => 'user-new', 'uses' => 'UserController@edit'));
Route::post('/user/save', array('as' => 'user-save-post', 'uses' => 'UserController@doSave'));

/*
|--------------------------------------------------------------------------
| Сhange Password
|--------------------------------------------------------------------------
*/
Route::get('/user/change_pass/{id?}', array('as' => 'user-change_pass', 'uses' => 'UserController@change_pass'));
Route::post('/user/change_pass', array('as' => 'user-change_pass-post', 'uses' => 'UserController@doChange_pass'));

/*
|--------------------------------------------------------------------------
| View, add, change, delete and save vacancies
|--------------------------------------------------------------------------
*/
Route::get('/vacancy/list', array('as' => 'vacancy-list', 'before' => 'auth','uses' => 'VacancyController@listItems'));
Route::get('/vacancy/delete/{id?}', array('as' => 'vacancy-delete', 'uses' => 'VacancyController@delete'));
Route::post('/vacancy/delete', array('as' => 'vacancy-delete-post', 'uses' => 'VacancyController@doDelete'));
Route::get('/vacancy/edit/{id?}', array('as' => 'vacancy-edit', 'uses' => 'VacancyController@edit'));
Route::get('/vacancy/add/{id?}', array('as' => 'vacancy-new', 'uses' => 'VacancyController@edit'));
Route::post('/vacancy/save', array('as' => 'vacancy-save-post', 'uses' => 'VacancyController@doSave'));

/*
|--------------------------------------------------------------------------
| View, add, change, delete and save categories
|--------------------------------------------------------------------------
*/
Route::get('/category/list', array('as' => 'category-list', 'before' => 'auth', 'uses' => 'CategoryController@listItems'));
Route::get('/category/delete/{id?}', array('as' => 'category-delete', 'uses' => 'CategoryController@delete'));
Route::post('/category/delete', array('as' => 'category-delete-post', 'uses' => 'CategoryController@doDelete'));
Route::get('/category/edit/{id?}', array('as' => 'category-edit', 'uses' => 'CategoryController@edit'));
Route::get('/category/add/{id?}', array('as' => 'category-new', 'uses' => 'CategoryController@edit'));
Route::post('/category/save', array('as' => 'category-save-post', 'uses' => 'CategoryController@doSave'));

/*
|--------------------------------------------------------------------------
| View, add, change, delete and save static page
|--------------------------------------------------------------------------
*/
Route::get('/page/list', array('as' => 'page-list', 'before' => 'auth', 'uses' => 'PageController@listItem'));
Route::get('/page/delete/{id?}', array('as' => 'page-delete', 'uses' => 'PageController@delete'));
Route::post('/page/delete', array('as' => 'page-detele-post', 'uses' => 'PageController@doDelete'));
Route::get('/page/edit/{id?}', array('as' => 'page-edit', 'uses' => 'PageController@edit'));
Route::get('/page/add/{id?}', array('as' => 'page-new', 'uses' => 'PageController@edit'));
Route::post('/page/save', array('as' => 'page-save-post', 'uses' => 'PageController@doSave'));

/*
|--------------------------------------------------------------------------
| View, add, change, delete and save blogs
|--------------------------------------------------------------------------
*/
Route::get('/blog/list', array('as' => 'blog-list', 'before' => 'auth', 'uses' => 'BlogController@listItem'));
Route::get('/blog/delete/{id?}', array('as' => 'blog-delete', 'uses' => 'BlogController@delete'));
Route::post('/blog/delete', array('as' => 'blog-detele-post', 'uses' => 'BlogController@doDelete'));
Route::get('/blog/edit/{id?}', array('as' => 'blog-edit', 'uses' => 'BlogController@edit'));
Route::get('/blog/add/{id?}', array('as' => 'blog-new', 'uses' => 'BlogController@edit'));
Route::post('/blog/save', array('as' => 'blog-save-post', 'uses' => 'BlogController@doSave'));

/*
|--------------------------------------------------------------------------
| View, add, change, delete and save companies
|--------------------------------------------------------------------------
*/
Route::get('/company/list', array('as' => 'company-list', 'before' => 'auth', 'uses' => 'CompaniesController@listItem'));
Route::get('/company/delete/{id?}', array('as' => 'company-delete', 'uses' => 'CompaniesController@delete'));
Route::post('/company/delete', array('as' => 'company-detele-post', 'uses' => 'CompaniesController@doDelete'));
Route::get('/company/edit/{id?}', array('as' => 'company-edit', 'uses' => 'CompaniesController@edit'));
Route::get('/company/add/{id?}', array('as' => 'company-new', 'uses' => 'CompaniesController@edit'));
Route::post('/company/save', array('as' => 'company-save-post', 'uses' => 'CompaniesController@doSave'));

/*
|------------------------------------------------------------------------------------
| View, add, change, delete and save countries
|------------------------------------------------------------------------------------
*/
Route::get('/country/list', array('as' => 'country-list', 'before' => 'auth', 'uses' => 'CountryController@listItem'));
Route::get('/country/delete/{id?}', array('as' => 'country-delete', 'uses' => 'CountryController@delete'));
Route::post('/country/delete', array('as' => 'country-detele-post', 'uses' => 'CountryController@doDelete'));
Route::get('/country/edit/{id?}', array('as' => 'country-edit', 'uses' => 'CountryController@edit'));
Route::get('/country/add/{id?}', array('as' => 'country-new', 'uses' => 'CountryController@edit'));
Route::post('/country/save', array('as' => 'country-save-post', 'uses' => 'CountryController@doSave'));

/*
|------------------------------------------------------------------------------------
| View, add, change, delete and save regions
|------------------------------------------------------------------------------------
*/
Route::get('/region/list', array('as' => 'region-list', 'before' => 'auth', 'uses' => 'RegionController@listItem'));
Route::get('/region/delete/{id?}', array('as' => 'region-delete', 'uses' => 'RegionController@delete'));
Route::post('/region/delete', array('as' => 'region-detele-post', 'uses' => 'RegionController@doDelete'));
Route::get('/region/edit/{id?}', array('as' => 'region-edit', 'uses' => 'RegionController@edit'));
Route::get('/region/add/{id?}', array('as' => 'region-new', 'uses' => 'RegionController@edit'));
Route::post('/region/save', array('as' => 'region-save-post', 'uses' => 'RegionController@doSave'));

/*
|------------------------------------------------------------------------------------
| View, add, change, delete and save cities
|------------------------------------------------------------------------------------
*/
Route::get('/city/list', array('as' => 'city-list', 'before' => 'auth', 'uses' => 'CityController@listItem'));
Route::get('/city/delete/{id?}', array('as' => 'city-delete', 'uses' => 'CityController@delete'));
Route::post('/city/delete', array('as' => 'city-detele-post', 'uses' => 'CityController@doDelete'));
Route::get('/city/edit/{id?}', array('as' => 'city-edit', 'uses' => 'CityController@edit'));
Route::get('/city/add/{id?}', array('as' => 'city-new', 'uses' => 'CityController@edit'));
Route::post('/city/save', array('as' => 'city-save-post', 'uses' => 'CityController@doSave'));
