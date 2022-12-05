<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
