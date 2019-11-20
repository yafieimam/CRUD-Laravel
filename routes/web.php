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
    return view('welcome');
});

Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/tambah', 'PegawaiController@tambah');
Route::post('/pegawai/proses_simpan', 'PegawaiController@proses_simpan');
Route::get('/pegawai/edit/{id}', 'PegawaiController@edit');
Route::put('/pegawai/update/{id}', 'PegawaiController@update');
Route::get('/pegawai/hapus/{id}', 'PegawaiController@delete');
Route::get('/pegawai/json', 'PegawaiController@json');

Route::resource('ajax-crud-list', 'PegawaiController');
Route::post('ajax-crud-list/store', 'PegawaiController@store');
Route::get('ajax-crud-list/delete/{id}', 'PegawaiController@destroy');
