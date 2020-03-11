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

// Route::get('/', function () {

// 		return view ('index');
// });

// Route::get('/about', function () {
// 	$nama = 'Feri Ferdiansyah'; 

// 		return view ('about', ['nama' => $nama]);
// });


// Route::get('/', 'PageController@home');
// Route::get('/about', 'PageController@about');

// Route::get('/lojin','AuthController@index')->name('login');
Route::get('/loginForm','AuthController@index');
Route::post('/postlogin','AuthController@postLogin');
Route::get('/logout','AuthController@logout');

// Route::group(['middleware' => 'auth'], function(){
// 	Route::get('/', 'ObatController@index');
// });
Route::get('/', 'ObatController@index');

Route::get('/export_excel', 'ObatController@export_excel');


Route::get('/dashboard/main', 'AdminObatController@index');


Route::get('/obat/index', 'ObatController@search');

Route::get('/create', 'ObatController@create');

Route::get('/{obat}', 'ObatController@show');

Route::post('/store', 'ObatController@store');

Route::delete('/{obat}', 'ObatController@destroy');

Route::get('/edit/{obat}', 'ObatController@edit');

Route::patch('/{obat}', 'ObatController@update');




