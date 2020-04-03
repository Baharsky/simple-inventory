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

Route::get('fakultas', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);

Route::get('/', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);

//FAKULTAS
//create
Route::get('/fakultas/create','FakultasController@create');
Route::post('/fakultas/store','FakultasController@store');
//edit-update
Route::get('/fakultas/{id}/edit', 'FakultasController@edit');
Route::post('/fakultas/{id}/update', 'FakultasController@update');
//delete
Route::get('/fakultas/{id}/delete', 'FakultasController@delete');


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