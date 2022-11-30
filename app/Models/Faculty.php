<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'faculty_name'
    ];
    //Relationship between Faculty and Courses
    public function course(){
        return $this->hasMany(Course::class);
    }
    
}
