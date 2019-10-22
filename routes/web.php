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
Route::get('home', 'HomeController@index');

Route::get('dist/{file}', 'PlotController@dist');

Route::post('/plot/{file}', 'PlotController@plot');
Route::get('results', 'PlotController@results');

<<<<<<< Updated upstream
Route::get('plot', 'FileController@plot')->name('files.plot');
=======
Route::get('upload', 'FileController@createFile')->name('files.createFile');
Route::get('insert', 'FileController@createData')->name('files.createData');
>>>>>>> Stashed changes

Route::resource('files', 'FileController');