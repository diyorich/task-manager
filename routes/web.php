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

Route::resource('/tags', 'TagsController');
Route::get('/tasktag/{tag_id}', 'TagsController@show')->name('tasktag.show');

Route::get('/', 'TasksController@index')->name('tasks.index');
Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
Route::post('/tasks/store', 'TasksController@store')->name('tasks.store');
Route::get('/tasks/show/{task_id}', 'TasksController@show')->name('tasks.show');
Route::get('/tasks/edit/{task_id}', 'TasksController@edit')->name('tasks.edit');
Route::put('/tasks/{task_id}', 'TasksController@update')->name('tasks.update');
Route::delete('/tasks/{task_id}', 'TasksController@destroy')->name('tasks.destroy');

Route::post('/tasks/show/{task_id}/comments/store', 'CommentController@store')->name('comments.store');
Route::get('/tasks/show/{task_id}/comments/edit/{id}', 'CommentController@edit')->name('comments.edit');
Route::put('/tasks/show/{task_id}/comments/update/{id}', 'CommentController@update')->name('comments.update');
Route::delete('/tasks/show/{task_id}/comments/delete/{id}', 'CommentController@destroy')->name('comments.destroy');


