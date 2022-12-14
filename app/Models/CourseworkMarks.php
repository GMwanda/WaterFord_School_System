<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseworkMarks extends Model
{
    use HasFactory;

    protected $fillable = [
        'stdId',
        'Assessment',
        'courseId',
        'Marks'
    ];
}
