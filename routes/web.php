<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::get('menu', 'HomeController@menu')->name('menu');

Route::get('plot', 'FileController@plot')->name('files.plot');
Route::get('digit', 'FileController@digit')->name('files.digit');

Route::resource('files', 'FileController');
