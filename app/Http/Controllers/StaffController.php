<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function defaultView(){
        $id = auth()->id();
        $lecturers = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.lecturer_id', '=', $id)->get();
        $personal_info = User::where('id', '=', $id)->first();
        return view('StaffViews.StaffPortal')->with('lecturer', $personal_info)->with('lecturers', $lecturers);
    }
    //Show coursework information regarding one course
    public function showCoursework($courseName){
        // $id = auth()->id();
        $course = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.course_name', '=', $courseName)->first();
        return view('StaffViews.Coursework')->with('course', $course);
    }

    // public function coursework(){
    //     $id = auth()->id();
    //     $lecturers = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.lecturer_id', '=', $id)->get();
    //     return view('StaffViews.StaffPortal')->with('lecturers', $lecturers);
    // }
}
