<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function defaultView(){
        $id = auth()->id();
        $lectures = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.lecturer_id', '=', $id)->get();
        $personal_info = User::where('id', '=', $id)->first();
        return view('StaffViews.StaffPortal')->with('lecturer', $personal_info)->with('lecturers', $lectures);
    }
    //Show coursework information regarding one course
    public function showCoursework($courseName){
        // $id = auth()->id();
        $course = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.course_name', '=', $courseName)->first();
        return view('StaffViews.Coursework')->with('course', $course);
        // return $personal_info;
    }
    //Show attendance view
    public function attendance(){
        $id = auth()->id();
        $lecturers = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.lecturer_id', '=', $id)->get();
        return view('StaffViews.Attendance')->with('lecturers', $lecturers);
    }
    //Update student attendance view
    public function markAttendanceView($courseName){
        $course_id = DB::table('courses')->select('id')->where('course_name', '=', $courseName)->first();
        $info = DB::table('users')->join('students', 'users.id', '=', 'students.UserId')->select('UserId', 'name', 'courseEnrolled')->orderBy('UserId')->get();
        $studentsEnrolled = $info->where('courseEnrolled', '=', $course_id->id);
        return view('StaffViews.updateAttendance')->with('Students', $studentsEnrolled)->with('courseName',$courseName)->with('courseId', $course_id);
    }
    public function updateAttendance(Request $request){
        // $test = $request->validate([
        //     'date' => 'required'
        // ]);
        // if(!$test){
        //     return view("StaffViews.updateAttendance")->with("errorMsg", "Date is required");
        // }
        $att = new Attendance;
        $att->Date = $request->Date;
        $att->StudentId = $request->StudentId;
        $att->Course = $request->CourseId;
        // $att->Status = $request->t_status;
        $att->save();
        //return $att;
        // return response()->json(['success' => 'Successfully']);
        return response()->json([
            'errora' => [
                [
                    'status' => 500,
                    'title' => 'Internal server error',
                    'message' => 'A more detailed error message to show the end user'
                ],
            ]
        ]);
        //return dd($request);

    }
    // public function coursework(){
    //     $id = auth()->id();
    //     $lecturers = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.lecturer_id', '=', $id)->get();
    //     return view('StaffViews.StaffPortal')->with('lecturers', $lecturers);
    // }
}
