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
Route::get('/projects/gettingstarted', ['as' => 'projects.gettingStarted', 'uses' => 'ProjectsController@gettingStarted']);
Route::get('/projects/form', ['as' => 'projects.form', 'uses' => 'ProjectsController@form']);
Route::post('/projects/form/complete', 'ProjectsController@formComplete');
Route::get('/projects/{id}', ['as' => 'projects.detail', 'uses' => 'ProjectsController@detail']);

Route::get('/users/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::post('/users/edit/complete', ['as' => 'users.editComplete', 'uses' => 'UsersController@editComplete']);
Route::patch('/users/user_information', ['as' => 'users.user_information', 'uses' => 'UsersController@userInformation']);
Route::post('/users/user_information/complete', 'UsersController@userInformationComplete');
Route::get('/users/profile/{id}', ['as' => 'users.profile', 'uses' => 'UsersController@profile']);