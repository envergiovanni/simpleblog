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

Route::get('/', 'BlogController@home')->name('page.home');
Route::get('/about', 'BlogController@about')->name('page.about');
Route::get('/contact', 'BlogController@getContact')->name('page.contact');
Route::post('/contact', 'BlogController@postContact')->name('send.contact.form');

Route::get('categoria/{slug}', 'BlogController@category')->name('page.category');
Route::get('etiqueta/{slug}', 'BlogController@tag')->name('page.tag');
Route::get('entrada/{slug}', 'BlogController@entry')->name('page.entry');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@home')->name('admin.home');
    Route::resource('categories', 'CategoryController', ['except' => 'show', 'as' => 'admin']);
    Route::resource('tags', 'TagController', ['except' => 'show', 'as' => 'admin']);
    Route::resource('posts', 'PostController', ['as' => 'admin']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
