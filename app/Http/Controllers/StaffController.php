<?php

namespace App\Http\Controllers;

use App\Http\Requests\announcementRequest;
use App\Http\Requests\assignmentRequest;
use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\notesRequest;
use App\Models\Announcments;
use App\Models\Assignments;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\CourseworkMarks;
use App\Models\Notes;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;

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
    public function updateAttendance(AttendanceRequest $request){
        $att = new Attendance;
        $att->Date = $request->Date;
        $att->StudentId = $request->StudentId;
        $att->Course = $request->CourseId;
        $att->Hours = $request->Hours;
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


    //    ASSIGNMENTS


    public function assignmentView($courseName){
        $r = Course::getStudentsEnrolled($courseName);
        return view('StaffViews.assignment')->with('courseId', $r['id']);
    }

    public function uploadAssignment(assignmentRequest $request){
        $assignment = new Assignments;
        $file = $request->assignmentFile;
        if($request->hasFile($file)){
            $file->store('Assignments');
        }
        $assignment->AssignmentFile = $file->getClientOriginalName();
        $assignment->Title = $request->t_heading;
        $assignment->Description = $request->t_description;
        $assignment->Due_Date = $request->t_dueDate;
        $assignment->CourseId = $request->t_courseId;
        $assignment->save();
        // return response($assignment, Response::HTTP_CREATED);
        return redirect()->route('tempcourseworkMarks.show');
    }


    //  NOTES / COURSE MATREAILS
    
    public function addNotesView($courseName){
        $r = Course::getStudentsEnrolled($courseName);
        return view('StaffViews.addNotes')->with('courseId', $r['id']);
    }

    public function uploadNotes(notesRequest $request){
        $material = new Notes;
        $file = $request->file_input;
        if($request->hasFile($file)){
            $file->store('Assignments');
        }
        $material->Title = $request->t_heading;
        $material->File = $file->getClientOriginalName();
        $material->CourseId = $request->t_courseId;
        $material->save();
        // return response($material, Response::HTTP_CREATED);        
        return redirect()->route('tempcourseworkMarks.show');
    }

    //  ANNOUNCEMENTS

    public function announcementsView($courseName){
        $r = Course::getStudentsEnrolled($courseName);
        return view('StaffViews.announcements')->with('courseId', $r['id']);
    }

    public function makeAnnouncment(announcementRequest $request){
        $announcement = new Announcments;
        $announcement->Announcement = $request->t_announcement;
        $announcement->CourseId = $request->t_courseId;
        $announcement->save();
        // return response($announcement, Response::HTTP_CREATED);        
        return redirect()->route('tempcourseworkMarks.show');
    }

}
