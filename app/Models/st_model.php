<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class st_model extends Model
{   use HasFactory;
    protected $table='students_profile';
    public  $timestamps=false;
}
