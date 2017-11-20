<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
	return view('fontend.master');
});

// -------------- BACKEND ------------------
// Login
Route::get('register', 'fontend\RegisterController@register')->name('name-register');
Route::get('backend/login', 'backend\LoginController@showLogin')->name('name-backend-login');
Route::post('backend/login', 'backend\LoginController@checkLogin')->name('name-backend-check-login');
Route::get('backend/logout', 'backend\LoginController@logout')->name('name-backend-logout');

Route::get('backend/dashboard', 'backend\AdminController@index')->name('name-backend-dashboard');

/**
 * Routing for User management
 */

Route::group(['prefix' => 'backend', 'middleware' => 'checkLogin'], function () {

	Route::get('/', ['as' => 'backend/index', 'uses' => 'backend\AdminController@index']);

	Route::group(['prefix' => 'user'], function () {
		Route::get('/index', ['as' => 'backend.user.index', 'uses' => 'backend\UserController@index']);
		Route::any('/create', ['as' => 'backend.user.create', 'uses' => 'backend\UserController@create']);
		Route::any('/edit/{id}', ['as' => 'backend.user.edit', 'uses' => 'backend\UserController@edit']);
		Route::any('/delete/{id}', ['as' => 'backend.user.delete', 'uses' => 'backend\UserController@delete']);
		Route::any('/exportExcel', ['as' => 'backend.user.export', 'uses' => 'backend\UserController@exportExcel']);

	});

	// Categories

	Route::group(['prefix' => 'categories'], function () {
        Route::any('/show/{id}', ['as' => 'backend.categories.show', 'uses' => 'backend\CategoriesController@show']);
		Route::get('/index', ['as' => 'backend.categories.index', 'uses' => 'backend\CategoriesController@index']);
		Route::any('/create', ['as' => 'backend.categories.create', 'uses' => 'backend\CategoriesController@create']);
		Route::any('/edit/{id}', ['as' => 'backend.categories.edit', 'uses' => 'backend\CategoriesController@edit']);
		Route::any('/delete/{id}', ['as' => 'backend.categories.delete', 'uses' => 'backend\CategoriesController@delete']);
	});
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
