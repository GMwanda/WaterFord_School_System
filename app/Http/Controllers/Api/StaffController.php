<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\courseMarksRequest;
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
    public function updateAttendance(AttendanceRequest $request){
        $att = new Attendance;
        // $d = strtotime($request->Date);
        // $att->Date = $request->Date;
        $att->Date = date("m-d-Y", $request->Date);
        $att->StudentId = $request->StudentId;
        $att->Course = $request->CourseId;
        $att->save();
        return $att;
        // return response([
        //     'data' => $att
        // ], Response::HTTP_CREATED);
    }
    public function updateCourseMarks(courseMarksRequest $req){
        $total = $req->Total;
        $marks = $req->Marks . "/" . $total;
        $temp = new CourseworkMarks;
        $temp->stdId = $req->stdId;
        $temp->Assessment = $req->Assessment;
        $temp->courseId = $req->CourseId;
        $temp->Marks = $marks;
        $temp->save();
        // return [
        //     new courseMarksResource($temp)
        // ];
        return response([
            'data' => new courseMarksResource($temp)
        ], Response::HTTP_CREATED);
    }
}
