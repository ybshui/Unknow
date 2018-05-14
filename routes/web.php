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

Route::get('/', 'IndexController@index')->name('articles');

Route::get('/adminArticles', 'Admin\ArticleController@articles')->name('admin.articles');

Route::name('admin.articles.')->group(function () {
	Route::get('articleWrite', 'Admin\ArticleController@write')->name('write');
	
	Route::post('articleCreate', 'Admin\ArticleController@create')->name('create');
	Route::get('articleView', 'Admin\ArticleController@view')->name('view');
	Route::get('articleUpdate', 'Admin\ArticleController@update')->name('update');
	Route::post('articleEdit', 'Admin\ArticleController@edit')->name('edit');
	Route::get('articleDelete', 'Admin\ArticleController@delete')->name('delete');
});

Route::name('admin.photos.')->group(function () {
	Route::get('photoList', 'Admin\PhotoController@lists')->name('list');
	Route::get('photoUpload', 'Admin\PhotoController@upload')->name('upload');
});



Route::post('/uploadImage', 'Admin\UploadController@uploadImage')->name('admin.uploadImage');
Route::get('/deleteImage', 'Admin\UploadController@deleteImage')->name('admin.deleteImage');
