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

Route::get('/LoginPortal', [App\Http\Controllers\HomeController::class, 'index'])->name('LoginPortal');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/StdPortal', [App\Http\Controllers\HomeController::class, 'index'])->name('stdhome');
Route::get('/StaffPortal', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('adminHome')->middleware('is_admin');
