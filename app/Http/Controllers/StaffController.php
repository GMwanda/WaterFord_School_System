<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\CourseworkMarks;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{

    // DEFAULT/GENERAL FUNCTIONS


    //Home page
    public function defaultView(){
        $r = Course::getLectureInformation();
        $personal_info = $r['info'];;
        $lectures = $r['lecs'];
        return view('StaffViews.StaffPortal')->with('lecturer', $personal_info)->with('lecturers', $lectures);
    }
    //Show coursework functionalities regarding one course
    public function showCourseworkFunctions($courseName){
        $course = Course::getCourse($courseName);
        return view('StaffViews.Coursework')->with('course', $course);
    }


    // ATTENDANCE


    //Show attendance view
    public function attendance(){
        $lecturers = Attendance::att();
        return view('StaffViews.Attendance')->with('lecturers', $lecturers);
    }
    //Show form to update students attendance
    public function markAttendanceView($courseName){
        $d = Course::getStudentsEnrolled($courseName);
        $studentsEnrolled = $d['stdEnrolled'];
        $course_id = $d['id'];
        return view('StaffViews.updateAttendance')->with('Students', $studentsEnrolled)->with('courseName',$courseName)->with('courseId', $course_id);
    }
    // Function that adds students attendance records to the database
    public function updateAttendance(Request $request){
        $att = new Attendance;
        $att->Date = $request->Date;
        $att->StudentId = $request->StudentId;
        $att->Course = $request->CourseId;
        $att->save();
        return response()->json([
            'error' => [
                [
                    'title' => 'Internal server error',
                    'message' => 'A more detailed error message to show the end user'
                ],
            ]
        ]);

    }
    
    // COURSEWORK MARKS

    // Shows page shwing the courses teaching
    public function showtempcourseWorkMarks(){
        $r = Course::getLectureInformation();
        $lecture = $r['lecs'];
        return view('StaffViews.tempcourseworkMarks')->with('lecturers', $lecture);
    }

    // Shows form to update coursework marks
    public function showCourseWorkMarks($courseName){
        $c = Course::getStudentsEnrolled($courseName);
        $studentsEnrolled = $c['stdEnrolled'];
        $course_id = $c['id'];
        return view('StaffViews.updateCourseMarks')->with('Students', $studentsEnrolled)->with('courseName',$courseName)->with('courseId', $course_id);
    }
    // Function to add coursework marks to database
    public function updateMarks(Request $req){
        $total = $req->total;
        $marks = $req->marks . "/" . $total;
        $temp = new CourseworkMarks;
        $temp->stdId = $req->stdId;
        $temp->Assessment = $req->Assessment;
        $temp->courseId = $req->CourseId;
        $temp->Marks = $marks;
        $temp->save();
        if(!$temp->save()){
            return response('Error', 500);
        }
        return response('Success', 200);
    }

    // Function to handle changing student coursework marks
    public function changeMarks(Request $request){
        $assessment = $request->t_assessment;
        $stdId = $request->t_stdId2;
        $marks = $request->t_marks."/".$request->t_total;
        $courseId = $request->t_courseId;
        $courseName = $request->t_courseName;
        $t = CourseworkMarks::where('stdId', '=', $stdId)->where('courseId', $courseId)->where('Assessment', $assessment)->first();
        $t->stdId = $stdId;
        $t->Marks = $marks;
        $t->Assessment = $assessment;
        $t->courseId = $courseId;
        $time = time();
        $t->updated_at = date('D-m-y', $time);
        $t->save();
        return redirect()->route('courseMarks.upload', $courseName);
    }
    



}
