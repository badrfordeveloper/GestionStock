<?php

use Illuminate\Support\Facades\Route;

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


Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get(Config::get('constants.ADMIN_PATH'), 'AdminController@index');
        Route::get(Config::get('constants.ADMIN_PATH').'projets', 'AdminController@index');
		/*Route::resource(Config::get('constants.ADMIN_PATH').'categories', 'Admin\\CategoriesController');*/
		/*=== Route Employeur ===*/
		/*Route::get(Config::get('constants.ADMIN_PATH').'users/{role}', 'Admin\\UsersController@index');
		Route::get(Config::get('constants.ADMIN_PATH').'users/{role}/create', 'Admin\\UsersController@create');
		Route::post(Config::get('constants.ADMIN_PATH').'users/{role}', 'Admin\\UsersController@store');*/
		//Route::put(Config::get('constants.ADMIN_PATH').'users/{role}', 'Admin\\UsersController@store');
		/*======================*/
     }
);
Auth::routes();

Route::get('/', 'publics\\PublicController@index');

Auth::routes();


Route::get('/home', 'publics\\PublicController@index')->name('home');


Route::resource('admin/users', 'Admin\\UsersController');