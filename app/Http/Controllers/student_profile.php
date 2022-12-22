<?php

namespace App\Http\Controllers;
use App\Models\st_model;
use App\Models\units_model;


use Illuminate\Http\Request;

class student_profile extends Controller
{
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
    public function getstudents_profile(){
       $st=st_model::all();
        return view('/students/studentsdetails',["st"=>$st]);
     }
     public function studentDelete($id){
        $studentObj = St_model();
        $studentObj->delete();

        return redirect('/show');
    }
    public function student_update($id){
        $st_u=st_model::find($id);
        return view('/students/editstudents',["st"=>$st_u]);
     }
     public function updated(Request $request){
        
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
 public function attend()
    {
        $st=st_model::all();
        return view('/students/attendance',["st"=>$st]);
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
    $r=units_model::all();
     return view('/students/getregisteredunits',["r"=>$r]);
  }
        
    }

