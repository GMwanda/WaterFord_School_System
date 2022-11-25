<?php

use App\Http\Controllers\StaffController;
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

//Route::get('/Staff', [App\Http\Controllers\parentController::class, 'staffHome'])->name('staffHome')->middleware('auth', 'is_admin');
//Route::get('/Staff', [App\Http\Controllers\parentController::class, 'staffHome'])->name('staffDashboard');
Route::get('/attendance', function(){
    return view('StaffViews.Attendance');
})->name('attendance');
Route::get('/markAttendance', function(){
    return view('StaffViews.updateAttendance');
})->name('updateAttendance');
Route::get('/Staff', [StaffController::class, 'defaultView'])->name('staffDashboard');
Route::get('/coursework', function(){
    return view('StaffViews.Coursework');
})->name('coursework');
Route::get('coursework/addNotes', function(){
    return view('StaffViews.addNotes');
})->name('addNotes');
Route::get('coursework/announcement', function(){
    return view('StaffViews.announcements');
})->name('announcements');
