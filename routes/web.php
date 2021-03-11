<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\TaskController@index')->name('task.index');
Route::post('/store', 'App\Http\Controllers\TaskController@store')->name('task.store');
Route::get('/{id}/complete', 'App\Http\Controllers\TaskController@complete')->name('task.complete');
Route::get('{id}/delete', 'App\Http\Controllers\TaskController@destroy')->name('task.delete');