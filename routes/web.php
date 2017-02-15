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

Route::get('/', 'WelcomeController@index');
Auth::routes();

//Route::get('/home', 'HomeController@index');




Route::get('home', ['as' => 'home', 'uses' => 'ProjectsController@dashboard']);

Route::get('bugs/by/{user}', ['as' => 'bugs.index.by', 'uses' => 'BugsController@indexBy']);
Route::get('bugs/assigned/{user}', ['as' => 'bugs.index.assigned', 'uses' => 'BugsController@indexAssigned']);
Route::get('bugs/status/{status}', ['as' => 'bugs.index.status', 'uses' => 'BugsController@indexStatus']);
Route::get('bugs/closed', ['as' => 'bugs.index.closed', 'uses' => 'BugsController@indexClosed']);
Route::get('bugs/pending', ['as' => 'bugs.index.pending', 'uses' => 'BugsController@indexPending']);
Route::get('bugs/{bugs}/close', ['as' => 'bugs.close', 'uses' => 'BugsController@close']);
Route::get('bugs/{bugs}/open', ['as' => 'bugs.open', 'uses' => 'BugsController@open']);
Route::resource('bugs', 'BugsController');

Route::resource('projects', 'ProjectsController');

Route::resource('features', 'FeaturesController');
