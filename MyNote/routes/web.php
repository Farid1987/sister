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

Route::get('/', 'noteController@index');

Auth::routes();
Route::get('auth/google', 'Auth\LoginController@redirectToProvider')->name('google.login');
Route::get('auth/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('/auth/google/addPass', 'Auth\LoginController@addPass');
Route::get('auth/google/vAddPass', 'Auth\LoginController@vAddPass');

Route::post('/addNote','noteController@addNote');
Route::get('/edit/{id}', 'noteController@getUpdate')->name('note.edit');
Route::put('/newUpdate/{id}', 'noteController@newUpdate');
Route::delete('/delete/{id}', 'noteController@deleteNote');
Route::get('/home', 'noteController@index');
