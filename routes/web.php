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
Route::get('/tasks/{task}', 'TasksController@show');
Route::get('/tasks/{task}/edit', 'TasksController@edit');

//Route to login page
Route::get('/login', 'LoginController@show');
