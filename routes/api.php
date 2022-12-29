<?php

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ApiStaffController,
    parentController,
    HomeController,
    StaffController
};
use App\Http\Controllers\Api\StaffController as ControllersApiStaffController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Api login
Route::post('/login', [LoginController::class, 'login'])->middleware('web');


/*
        STAFF API ROUTES
*/
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/coursework', [ControllersApiStaffController::class, 'getClassesTeaching']);
    Route::get('/course/{courseName}/students-enrolled', [ControllersApiStaffController::class, 'getStudentEnrollment']);
    Route::post('course/{courseName}/attendance', [ControllersApiStaffController::class, 'updateAttendance']);
    Route::post('course/{courseName}/course-marks', [ControllersApiStaffController::class, 'updateCourseMarks']);
});
