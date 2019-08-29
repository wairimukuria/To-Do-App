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

/* --Loading the view directly for index and about--
Route::get('/', function () {
    return view('pages.index');
});

Route::get('/about', function () {
    return view('pages.about');
});
*/

//
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::resource('tasks', 'TasksController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
