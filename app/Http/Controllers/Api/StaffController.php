<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\courseMarksRequest;
use App\Http\Resources\attendanceResource;
use App\Http\Resources\courseMarksResource;
use App\Http\Resources\stdEnrolledCollection;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\CourseworkMarks;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('getClassesTeaching');
    }
    public function getClassesTeaching(){
        $r = Course::getLectureInformation();
        $lecture = $r['lecs'];
        return $lecture;
    }
    public function getStudentEnrollment($courseName){
        $d = Course::getStudentsEnrolled($courseName);
        $studentsEnrolled = $d['stdEnrolled'];
        return stdEnrolledCollection::collection($studentsEnrolled);
        // return $studentsEnrolled;
    }
    public function uploadAttendance(AttendanceRequest $request){
        $att = new Attendance;
        $d = strtotime($request->Date);
        // $att->Date = $request->Date;
        $att->Date = date("Y-m-d", $d);
        $att->StudentId = $request->StudentId;
        $att->Course = $request->CourseId;
        $att->save();
        // return $att;
        return response([
            new attendanceResource($att)
        ], Response::HTTP_CREATED);
    }

    public function uploadCourseMarks(courseMarksRequest $req){
        $total = $req->Total;
        $marks = $req->Marks . "/" . $total;
        $temp = new CourseworkMarks;
        $temp->stdId = $req->stdId;
        $temp->Assessment = $req->Assessment;
        $temp->courseId = $req->CourseId;
        $temp->Marks = $marks;
        $temp->save();
        return response([
            new courseMarksResource($temp)
        ], Response::HTTP_CREATED);
    }

    public function updateCourseMarks(Request $request){
        $assessment = $request->Assessment;
        $stdId = $request->stdId;
        $marks = $request->Marks."/".$request->Total;
        $courseId = $request->CourseId;
        // $courseName = $request->courseName;
        $t = CourseworkMarks::where('stdId', '=', $stdId)->where('courseId', $courseId)->where('Assessment', $assessment)->first();
        $t->stdId = $stdId;
        $t->Marks = $marks;
        $t->Assessment = $assessment;
        $t->courseId = $courseId;
        $time = time();
        $t->updated_at = date('D-m-y', $time);
        $t->save();
        return response([
            new courseMarksResource($t)
        ], Response::HTTP_OK);
    }
}
