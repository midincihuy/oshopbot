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
    return redirect()->route('update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chat', 'CheckController@chat')->name('chat');
Route::get('/tuser', 'CheckController@tuser')->name('tuser');
Route::get('/update', 'CheckController@update')->name('update');
Route::get('/absen', 'CheckController@absen')->name('absen');
