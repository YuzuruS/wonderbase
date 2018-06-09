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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', ['as' => 'projects.index', 'uses' => 'ProjectsController@index']);

Route::get('/users/profile/{body}', ['as' => 'users.profile', 'uses' => 'UsersController@profile']);
Route::get('/users/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::post('/users/edit/complete', ['as' => 'users.editComplete', 'uses' => 'UsersController@editComplete']);