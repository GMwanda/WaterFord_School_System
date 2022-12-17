<?php

use App\Http\Controllers\StaffController;
use App\Models\Student;
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

// {SCREENS AVAILABLE WITHOUR LOGIN}
Route::get('/', 'App\Http\Controllers\parentController@index');
Route::get('/contact', 'App\Http\Controllers\parentController@contact');
Route::get('/courses', 'App\Http\Controllers\parentController@courses');

Route::get('/LoginPortal', [App\Http\Controllers\parentController::class, 'LoginPortal'])->name('LoginPortal');
Auth::routes();

// {STUDENT HOME SCREEN}
Route::get('/home', [App\Http\Controllers\HomeController::class, 'stdHome'])->name('home');

//                                  {LOGGED IN STAFF SCREENS @NYAMO}
//Route::get('/Staff', [App\Http\Controllers\parentController::class, 'staffHome'])->name('staffHome')->middleware('auth', 'is_admin');
//Route::get('/Staff', [App\Http\Controllers\parentController::class, 'staffHome'])->name('staffDashboard');


//Staff dashboard view
Route::get('/Staff', [StaffController::class, 'defaultView'])->name('staffDashboard');
//Staff coursework view
// Route::get('/coursework', function(){
//     return view('StaffViews.Coursework');
// })->name('coursework');
// Show courses teaching
Route::get('/coursework', [StaffController::class, 'showtempcourseWorkMarks'])->name('tempcourseworkMarks.show');
//Show functions in a particular course
Route::get('/coursework/{courseName}', [StaffController::class, 'showCourseworkFunctions'])->name('courseworkFunctions.show');
//Add courswork content/notes to a particular course
Route::get('coursework/{courseName}/addNotes', function(){
    return view('StaffViews.addNotes');
})->name('addNotes');
//Make an announcement for a particular group of students
Route::get('coursework/{courseName}/announcement', function(){
    return view('StaffViews.announcements');
})->name('announcements');
Route::get('coursework/{courseName}/assignment', function () {
    return view('StaffViews.assignment');
})->name('assignments');
// Show form to update marks
Route::get('/coursework/{courseName}/update-marks', [StaffController::class, 'showCourseWorkMarks'])->name('courseMarks.upload');
// Route to handle student marks form post method
Route::post('/coursework/update-marks', [StaffController::class, 'updateMarks']);
// Change/correct coursework marks
Route::post('/coursework/change-marks', [StaffController::class, 'changeMarks'])->name('courseMarks.change');
// Show attendance view
Route::get('/attendance', [StaffController::class, 'attendance'])->name('Attendance');
// Update attendance view
Route::get('/attendance/{courseName}/update-attendance', [StaffController::class, 'markAttendanceView'])->name('Attendance.markAttenanceView');
// Update attendance route
Route::post('/attendance/update-attendance', [StaffController::class, 'updateAttendance'])->name('Attendance.updateAttendance');

