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

Route::get('/home', 'ChatsController@home')->name('home');
Route::get('/', 'ChatsController@index');
Route::get('messages/{id}', 'ChatsController@fetchMessages');
Route::post('messages/{id}', 'ChatsController@sendMessage');
Route::get('user', 'usersController@index');
