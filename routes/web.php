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
//Auth
Route::get('/login','AuthController@login')->name('login');
Route::post('/postLogin','AuthController@postLogin');
Route::post('/register','AuthController@register');
Route::get('/logout','AuthController@logout');
Route::get('/sendemail','EmailController@send');

Route::group(['middleware' => ['auth','CheckRole:admin']], function(){
//FAKULTAS
//create
Route::get('fakultas', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);
Route::get('/', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);
Route::get('/fakultas/create','FakultasController@create');
Route::post('/fakultas/store','FakultasController@store');
//edit-update
Route::get('/fakultas/{id}/edit', 'FakultasController@edit');
Route::post('/fakultas/{id}/update', 'FakultasController@update');
//delete
Route::get('/fakultas/{id}/delete', 'FakultasController@delete');
//import
Route::post('/fakultas/import', 'FakultasController@import');



//JURUSAN
Route::get('jurusan', ['as' => 'jurusan.index', 'uses' => 'JurusanController@index']);
//create
Route::get('/jurusan/create','JurusanController@create');
Route::post('/jurusan/store','JurusanController@store');
//edit-update
Route::get('/jurusan/{id}/edit', 'JurusanController@edit');
Route::post('/jurusan/{id}/update', 'JurusanController@update');
//delete
Route::get('/jurusan/{id}/delete', 'JurusanController@delete');
//search
Route::get('/jurusan/search', 'JurusanController@search');
//export
Route::get('/jurusan/export', 'JurusanController@export');

//RUANGAN
Route::get('ruangan', ['as' => 'ruangan.index', 'uses' => 'RuanganController@index']);
//create
Route::get('/ruangan/create','RuanganController@create');
Route::post('/ruangan/store','RuanganController@store');
//edit-update
Route::get('/ruangan/{id}/edit', 'RuanganController@edit');
Route::post('/ruangan/{id}/update', 'RuanganController@update');
//delete
Route::get('/ruangan/{id}/delete', 'RuanganController@delete');
//search
Route::get('/ruangan/search', 'RuanganController@search');
});



Route::group(['middleware' => ['auth','CheckRole:admin,staff']], function(){
Route::get('dashboard', 'Controller@dashboard');	
//BARANG
Route::get('barang', ['as' => 'barang.index', 'uses' => 'BarangController@index']);
//create
Route::get('/barang/create','BarangController@create');
Route::post('/barang/store','BarangController@store');
//edit-update
Route::get('/barang/{id}/edit', 'BarangController@edit');
Route::post('/barang/{id}/update', 'BarangController@update');
//delete
Route::get('/barang/{id}/delete', 'BarangController@delete');
//search
Route::get('/barang/search', 'BarangController@search');
//export
Route::get('/barang/export', 'BarangController@export');
});
