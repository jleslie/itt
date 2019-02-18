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

/**
 * Page Routes 
 * These are used for returning pages that do not have controller logic associated with them
 */
Route::get('/', 'PagesController@getHome');

/**
 * Content routes
 */
Route::get('/content', 'ContentsController@Index');
Route::get('/content/create', 'ContentsController@Create');
Route::get('/content/edit/{id?}', 'ContentsController@Edit');

Route::post('/content/save', 'ContentsController@save');
Route::post('/content/delete', 'ContentsController@delete');

/**
 * Blog Routes
 */
Route::get('/blog/{id?}', 'BlogsController@index');

/**
 * User Routes
 */
Route::get('/logout', 'UsersController@getLogout'); 

/**
 * Laravel created routes for Auth
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
