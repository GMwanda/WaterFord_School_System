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

Route::get('/', 'App\Http\Controllers\parentController@index');

Route::get('/contact', 'App\Http\Controllers\parentController@contact');

Route::get('/courses', 'App\Http\Controllers\parentController@courses');

Route::get('/Student_Portal', 'App\Http\Controllers\parentController@StudentPortal');
