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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'IndexController@index')->name('index');
Route::get('/show', 'IndexController@show')->name('show');

Route::get('/admin', 'Admin\IndexController@index')->name('admin.index');
Route::post('/create', 'Admin\IndexController@create')->name('admin.create');
