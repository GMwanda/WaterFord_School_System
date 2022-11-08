<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function defaultView(){
        $id = auth()->id();
        $personal_info = DB::table('users')->join('lecturers', 'users.id', '=', 'lecturers.user_id')->where('users.id', '=', $id)->first();
        return view('StaffViews.StaffPortal')->with('lecturer', $personal_info);
    }
}
