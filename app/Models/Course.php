<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name', 
        'faculty_id',
        'lecturer_id'
    ];

    //Relationship between Faculty and Courses
    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    //Relationship between Users i.e lecturers/students and Courses
    public function user(){
        return $this->belongsTo(User::class, 'lecturer_id');
    }
    public static function getCourse($courseName){
        $course = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.course_name', '=', $courseName)->first();
        return $course;
    }
    public static function getLectureInformation(){
        $id = auth()->id();
        $lec = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.lecturer_id', '=', $id)->get();
        $lectures = $lec->unique('course_name');
        $personal_info = User::where('id', '=', $id)->first();
        $t = ['lecs'=>$lectures, 'info'=>$personal_info];
        return $t;
    }
    public static function getStudentsEnrolled($courseName){
        $course_id = DB::table('courses')->select('id')->where('course_name', '=', $courseName)->first();
        $info = DB::table('users')->join('students', 'users.id', '=', 'students.UserId')->select('UserId', 'name', 'courseEnrolled')->orderBy('UserId')->get();
        $studentsEnrolled = $info->where('courseEnrolled', '=', $course_id->id)->unique();
        $q = ['id' => $course_id, 'stdEnrolled' => $studentsEnrolled];
        return $q;
    }

}
