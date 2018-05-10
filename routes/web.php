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


Route::get('/write', 'Admin\IndexController@index')->name('admin.index');
Route::get('/admin', 'Admin\IndexController@articles')->name('admin.articles');
Route::post('/create', 'Admin\IndexController@create')->name('admin.create');
Route::get('/view', 'Admin\IndexController@view')->name('admin.view');
Route::get('/update', 'Admin\IndexController@update')->name('admin.update');
Route::post('/edit', 'Admin\IndexController@edit')->name('admin.edit');

Route::post('/uploadImage', 'Admin\UploadController@uploadImage')->name('admin.uploadImage');
Route::get('/deleteImage', 'Admin\UploadController@deleteImage')->name('admin.deleteImage');