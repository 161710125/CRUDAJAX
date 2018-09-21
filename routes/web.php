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

Route::resource('/', 'KelasController');
Route::post('store', 'KelasController@store');
Route::get('/json', 'KelasController@json');
Route::get('/delete', 'KelasController@removedata')->name('delete');
Route::get('json/fetchdata', 'KelasController@fetchdata')->name('jjj');

Route::post('siswa/edit/{id}', 'KelasController@update');
Route::get('getedit/{id}', 'KelasController@edit');