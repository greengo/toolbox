<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', ['as' => 'home', 'uses' => 'WelcomeController@index']);



Route::get('bugs/by/{user}', ['as' => 'bugs.index.by', 'uses' => 'BugsController@indexBy']);
Route::get('bugs/assigned/{user}', ['as' => 'bugs.index.assigned', 'uses' => 'BugsController@indexAssigned']);
Route::get('bugs/status/{status}', ['as' => 'bugs.index.status', 'uses' => 'BugsController@indexStatus']);
Route::get('bugs/closed', ['as' => 'bugs.index.closed', 'uses' => 'BugsController@indexClosed']);
Route::get('bugs/pending', ['as' => 'bugs.index.pending', 'uses' => 'BugsController@indexPending']);
Route::get('bugs/{bugs}/close', ['as' => 'bugs.close', 'uses' => 'BugsController@close']);
Route::get('bugs/{bugs}/open', ['as' => 'bugs.open', 'uses' => 'BugsController@open']);

Route::resource('bugs', 'BugsController');
