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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'ChatController@index')->name('chat');
Route::get('/chat-message', 'ChatController@getMessage');
Route::post('/message', 'ChatController@postMessage');

Route::get('/grup', 'GrupController@index')->name('grup');
Route::get('/grup/create', 'GrupController@create')->name('grup.create');
Route::post('/grup/create', 'GrupController@store')->name('grup.store');



