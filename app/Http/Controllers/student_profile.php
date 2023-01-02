
 <?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use App\Models\st_model;
use App\Models\units_model;
use App\Models\CourseworkMarks;

use Auth;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class student_profile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function st_profile()
    {
        return view('/students/student');
    }
    public function st_Added(Request $request){
        
           $studentObj = new st_model();

        $studentObj->Name = $request->Name;
        $studentObj->Phone = $request->Phone;
        $studentObj->Birth = $request->Birth;
        $studentObj->Gender = $request->Gender;
        $studentObj->Class = $request->cl;
        $studentObj->Address = $request->Address;
        $studentObj->fatherName = $request->FatherName;
        $studentObj->fatherPhone = $request->FatherPhone;
        $studentObj->Status = $request->Status;

        $studentObj->save();
        return redirect('/st');
    }
    public function getstudents_profile()
    {

        $id = Auth()->id();
        $st= st_model::where('id', $id)->first();
        // return view('/students/studentsdetails', ["st" => $st]);
        return $st;
    }
    public function studentDelete($id)
    {
        $studentObj = St_model::find($id);
        $studentObj->delete();

        return redirect('/show');
    }
    public function student_update($id)
    {
        $st_u = st_model::find($id);
        return view('/students/editstudents', ["st" => $st_u]);
    }
    public function updated(Request $request, $id)
    {

        $studentObj = St_model::find($id);

        $studentObj->Name = $request->Name;
        $studentObj->Phone = $request->Phone;
        $studentObj->Birth = $request->Birth;
        $studentObj->Gender = $request->Gender;
        $studentObj->Class = $request->cl;
        $studentObj->Address = $request->Address;
        $studentObj->fatherName = $request->FatherName;
        $studentObj->fatherPhone = $request->FatherPhone;
        $studentObj->Status = $request->Status;

        $studentObj->save();
        return redirect('/show');
    }
    public function marks()
    {
        $id = Auth()->id;
        $users = CourseworkMarks::where('stdId', $id)->get();
        return view('/students/marksview', ["users" => $users]);
    }
    public function st_dashboard()
    {
        return view('/students/studentlayout');
    }
    public function get_units()
    {
        return view('/students/register_units');
    }
    public function add_units(Request $request){
        
    $unit = new units_model();
    $unit->Name = $request->Name;
    $unit->Class = $request->class;
    $unit->units = $request->units;
    $unit->save();
    return redirect('/units');
     
 }
 public function getsregistered_units(){
  $name=Auth()->name;
    $r=units_model::where('Name',$name)->get();
     return view('/students/getregisteredunits',["r"=>$r]);
  }
  
    public function getAttendance(){
        $id = auth()->id();
        $att = Attendance::where('StudentId', $id)->orderBy('Course')->get();
        $std = Student::where('UserId', $id)->select('CourseEnrolled')->get();
        $c = collect();
        $courses = collect($att);
        foreach ($att->unique('Course') as $s) {
            $v = Course::where('id', $s->Course)->select('course_name')->first();
            $c[$s->Course] = $v->course_name;
            $GLOBALS[$v->course_name] = $s->Course;
        }
        $g = collect();
        foreach ($c as $f) {
            // echo $GLOBALS[$f];
            // echo $GLOBALS[$f] . " =>" . $courses->where('Course', $GLOBALS[$f]);
            // echo $GLOBALS[$f] . " =>" . round($courses->where('Course', $GLOBALS[$f])->sum('Hours')/38*100,2). " ";
            $g[$GLOBALS[$f]] = round($courses->where('Course', $GLOBALS[$f])->sum('Hours') / 38 * 100, 2);
        }
        $x = $courses->groupBy('Course');
        $y = collect($g);
        return view('students.attendanceViewOne')->with('Course', $courses);
        echo $x;

        
        


        
    }        
    

    
    
}
