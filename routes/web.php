<?php

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    parentController,
    HomeController,
    StaffController,
    student_profile,
    AdminController
};

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
Auth::routes();

// {SCREENS AVAILABLE WITHOUR LOGIN}
Route::get('/', [parentController::class, 'index'])->name(name: 'index');
Route::get('/contact', [parentController::class, 'contact'])->name(name: 'contact');
Route::get('/courses', [parentController::class, 'courses'])->name(name: 'courses');
Route::get('/LoginPortal', [parentController::class, 'LoginPortal'])->name(name: 'LoginPortal');

// {STUDENT HOME SCREEN}
Route::get('/home', [HomeController::class, 'stdHome'])->name('home')->middleware('auth', 'is_admin');
//students

Route::get('/st', 'App\Http\Controllers\student_profile@st_profile');
Route::post('/st_add', 'App\Http\Controllers\student_profile@st_Added');
Route::get('/show', 'App\Http\Controllers\student_profile@getstudents_profile');
Route::get('delete/{id}', 'App\Http\Controllers\student_profile@studentDelete');
Route::get('update/{id}', 'App\Http\Controllers\student_profile@student_update');
Route::post('/updated/{id}', 'App\Http\Controllers\student_profile@updated');
Route::get('/stdashboard', 'App\Http\Controllers\student_profile@st_dashboard');
Route::get('/units', 'App\Http\Controllers\student_profile@get_units');
Route::post('/add_units', 'App\Http\Controllers\student_profile@add_units');
Route::get('/get', 'App\Http\Controllers\student_profile@getsregistered_units');
Route::get('/marks', 'App\Http\Controllers\student_profile@marks');





//                                  {LOGGED IN STAFF SCREENS @NYAMO}
//Route::get('/Staff', [App\Http\Controllers\parentController::class, 'staffHome'])->name('staffHome')->middleware('auth', 'is_admin');
//Route::get('/Staff', [App\Http\Controllers\parentController::class, 'staffHome'])->name('staffDashboard');
Route::group(['middleware' => ['auth', 'is_admin']], function () {
    //STAFF SCREEN 
    //Staff dashboard view
    Route::get('/Staff', [StaffController::class, 'defaultView'])->name('staffDashboard');
    // Show courses teaching
    Route::get('/coursework', [StaffController::class, 'showtempcourseWorkMarks'])->name('tempcourseworkMarks.show');
    // Show functions in a particular course
    Route::get('/coursework/{courseName}', [StaffController::class, 'showCourseworkFunctions'])->name('courseworkFunctions.show');
    // Show add courswork content/notes form
    Route::get('coursework/{courseName}/addNotes', [StaffController::class, 'addNotesView'])->name('addNotes');
    // Route to handle addNotes post request
    Route::post('/addNotes/upload', [StaffController::class, 'uploadNotes']);
    // Show announcement form
    Route::get('coursework/{courseName}/announcement', [StaffController::class, 'announcementsView'])->name('announcements');
    // Route to handle announcements post requests
    Route::post('/announcement/upload', [StaffController::class, 'makeAnnouncment']);
    // Show form to create assignment
    Route::get('coursework/{courseName}/assignment', [StaffController::class, 'assignmentView'])->name('assignments');
    // Route to handle assignment post request
    Route::post('/assignment/upload', [StaffController::class, 'uploadAssignment']);
    // Show form to update marks
    Route::get('/coursework/{courseName}/update-marks', [StaffController::class, 'showCourseWorkMarks'])->name('courseMarks.upload');
    // Route to handle student marks form post method
    Route::post('/coursework/update-marks', [StaffController::class, 'updateMarks']);
    // Change/correct coursework marks
    Route::put('/coursework/change-marks', [StaffController::class, 'changeMarks'])->name('courseMarks.change');
    // Show attendance view
    Route::get('/attendance', [StaffController::class, 'attendance'])->name('Attendance');
    // Update attendance view
    Route::get('/attendance/{courseName}/update-attendance', [StaffController::class, 'markAttendanceView'])->name('Attendance.markAttenanceView');
    // Update attendance route
    Route::post('/attendance/update-attendance', [StaffController::class, 'updateAttendance'])->name('Attendance.updateAttendance');
});

//ADMIN



//students
Route::get('/st', 'App\Http\Controllers\student_profile@st_profile');
Route::post('/st_add', 'App\Http\Controllers\student_profile@st_Added');
Route::get('/show', 'App\Http\Controllers\student_profile@getstudents_profile');
Route::get('delete/{id}','App\Http\Controllers\student_profile@studentDelete');
Route::get('update/{id}','App\Http\Controllers\student_profile@student_update'); 
Route::post('/updated/{id}', 'App\Http\Controllers\student_profile@updated'); 
Route::get('/stdashboard', 'App\Http\Controllers\student_profile@st_dashboard');
Route::get('/units', 'App\Http\Controllers\student_profile@get_units');
Route::post('/add_units', 'App\Http\Controllers\student_profile@add_units');
Route::get('/get', 'App\Http\Controllers\student_profile@getsregistered_units');
Route::get('/marks', 'App\Http\Controllers\student_profile@marks');
Route::get('/attendance-show', 'App\Http\Controllers\student_profile@getAttendance');

//ADMIN
Route::get('/admin', 'App\Http\Controllers\AdminController@adminHome');
Route::get('/adminRegister', 'App\Http\Controllers\AdminController@adminRegister');
Route::post('/addUser', 'App\Http\Controllers\AdminRegisterController@add_user');
Route::post('/updateUser/{id}', 'App\Http\Controllers\AdminRegisterController@update_user');
