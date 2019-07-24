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

Route::get('home', 'HomeController@index')->name('home');

Route::resource('files', 'FileController');


// Route::get('/files', 'FileController@files')->name('files');
// Route::get('/fileForm', 'FileController@fileForm')->name('fileForm');
// Route::post('/upload', 'FileController@upload')->name('upload');
// Route::post('/destroy', 'FileController@destroy')->name('destroy');
