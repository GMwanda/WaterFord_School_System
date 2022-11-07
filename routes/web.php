<?php

use Illuminate\Support\Facades\Auth;
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

// Route::prefix('admin')->middleware('auth')->group(function () {
// });

Route::get('/', 'App\Http\Controllers\parentController@index');

Route::get('/contact', 'App\Http\Controllers\parentController@contact');

Route::get('/courses', 'App\Http\Controllers\parentController@courses');

Route::get('/LoginPortal', [App\Http\Controllers\parentController::class, 'LoginPortal'])->name('LoginPortal');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'stdHome'])->name('home');

Route::get('/Staff', [App\Http\Controllers\parentController::class, 'staffHome'])->name('staffHome')->middleware('auth');

