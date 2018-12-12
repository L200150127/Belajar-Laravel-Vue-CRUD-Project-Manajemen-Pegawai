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

// Auth::routes(['register' => false]);
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'HomeController@index')->name('home');
	
	Route::get('/jabatan/data', 'JabatanController@data');
	Route::resource('/jabatan', 'JabatanController')->except(['index', 'show']);

	Route::get('/pegawai/data', 'PegawaiController@data');
	Route::resource('/pegawai', 'PegawaiController')->except(['index', 'show']);

	Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});

