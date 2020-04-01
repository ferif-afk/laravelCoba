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
Route::get('/export_excel1', 'AdminObatController@export_excel');


Route::get('/dashboard/main', 'AdminObatController@index');

Route::get('/create', 'AdminObatController@create');

Route::get('/{obat}', 'AdminObatController@show');

Route::post('/store', 'AdminObatController@store');

Route::delete('/{obat}', 'AdminObatController@destroy');

Route::delete('/gudang/{gudang}', 'GudangController@destroy');

Route::get('/edit2/{gudang}', 'GudangController@edit');

Route::patch('/gd/{gudang}', 'GudangController@update');

Route::get('/export_excel2', 'GudangController@export_excel');



