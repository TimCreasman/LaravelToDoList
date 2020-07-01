<?php

use Illuminate\Support\Facades\Route;

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

//Route to landing page
Route::get('/', 'LandingController@show');

//Route to individual task page
//Route to list of tasks controller to show all tasks
Route::get('/tasks', 'TasksController@index');
Route::post('/tasks', 'TasksController@store');
Route::get('/tasks/create', 'TasksController@create');
Route::get('/tasks/{task}', 'TasksController@show')->name('tasks.show');
Route::get('/tasks/{task}/edit', 'TasksController@edit');
Route::put('/tasks/{task}/complete', 'TasksController@complete');
Route::put('/tasks/{task}', 'TasksController@update');
Route::delete('/tasks/{task}', 'TasksController@destroy');

//Route to login page
Route::get('/login', 'LoginController@show');
