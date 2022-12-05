<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'Date',
        'StudentId',
        // 'Status',
        'Course',
        'created_at',
        'updated_at'
    ];
}
