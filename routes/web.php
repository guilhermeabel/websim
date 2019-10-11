<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::get('menu', 'HomeController@menu')->name('menu');

Route::get('plot', 'FileController@plot')->name('files.plot');
// Route::get('createFile', 'FileController@createFile')->name('files.createFile');
// Route::get('createData', 'FileController@createData')->name('files.createData');

Route::resource('files', 'FileController');
