<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\CourseworkMarks;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{


    public function adminHome()
    {
        $r = Course::getLectureInformation();
        $personal_info = $r['info'];;
        $lectures = $r['lecs'];
        return view('Admin.AdminHome')->with('lecturer', $personal_info)->with('lecturers', $lectures);;
    }
}
