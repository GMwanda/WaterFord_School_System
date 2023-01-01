<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'Date',
        'StudentId',
        'Hours',
        'Course',
        'created_at',
        'updated_at'
    ];
    // Return courses taught by a particular lecturer
    public static function att(){
        $id = auth()->id();
        $lectures = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')->select('courses.course_name', 'faculties.faculty_name')->where('courses.lecturer_id', '=', $id)->get();
        return $lectures;
    }
}
