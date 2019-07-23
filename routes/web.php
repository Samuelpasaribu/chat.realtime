<?php

use App\Models\GrupUserChat;
use App\Models\User;
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
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'ChatController@index')->name('chat');
Route::get('/chat-message', 'ChatController@getMessage');
Route::post('/message', 'ChatController@postMessage');

Route::get('/grup', 'GrupController@index')->name('grup');
Route::get('/grup/create', 'GrupController@create')->name('grup.create');
Route::post('/grup/create', 'GrupController@store')->name('grup.store');
Route::get('/grup/get-grup', 'GrupController@getGrup')->name('get-grup');

Route::get('/grup-chat/chat/{id}', 'GrupChatController@index')->name('grup-chat');
Route::get('/grup-chat/message/{id}', 'GrupChatController@getGrupChat');
Route::post('/grup-chat/message', 'GrupChatController@postGrupChat');
Route::get('/grup-chat/create/{id}', 'GrupChatController@create')->name('undang');
Route::post('/grup-chat/create', 'GrupChatController@store')->name('grup-chat.store');


Route::get('/private', 'PrivateController@index')->name('private');
Route::get('/private/chat/{id_tujuan}', 'PrivateController@chat')->name('private-chat');
Route::get('/private/message/{id}', 'PrivateController@getPrivateChat');
Route::post('/private/message', 'PrivateController@postPrivateChat');
Route::post('/private/status', 'PrivateController@postStatusChat');
Route::get('/private/get-user', 'PrivateController@getUser')->name('get-user');




// Broadcast::routes(['middleware' => 'auth:admin']);

// Route::get('test-broadcast', function(){
//     broadcast(new \App\Events\GrupEvent($GrupUserChat));
// });




