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
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('add', 'PostController@index')->name('add');
Route::post('viewPost', 'PostController@create');
Route::get('viewPost/{id}', 'PostController@store');

Route::get('delete/{id}', 'PostController@destroy')->name('delete');
Route::get('edit/{id}', 'PostController@edit')->name('edit');

Route::post('updatePost/{id}', 'PostController@update');

Route::get('search', 'PostController@search');

