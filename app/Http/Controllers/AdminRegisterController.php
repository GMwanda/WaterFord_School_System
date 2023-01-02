<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminRegisterModel;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_user(Request $request)
    {

        $newUserObj = new AdminRegisterModel();

        $newUserObj->name = $request->name;
        $newUserObj->gender = $request->gender;
        $newUserObj->dob = $request->dob;
        $newUserObj->email = $request->email;
        $newUserObj->address = $request->address;
        $newUserObj->phone_number = $request->phone_number;
        $newUserObj->password = $request->password;
        
        // $newUserObj->is_admin = $request->is_admin;

        $newUserObj->save();
        return redirect('/admin');
    }
    public function update_user(Request $request, $id)
    {

        $newUserObj = AdminRegisterModel::find($id);

        $newUserObj->name = $request->name;
        $newUserObj->gender = $request->gender;
        $newUserObj->dob = $request->dob;
        $newUserObj->email = $request->email;
        $newUserObj->address = $request->address;
        $newUserObj->phone_number = $request->phone_number;
        $newUserObj->password = $request->password;
        $newUserObj->is_admin = $request->is_admin;

        $newUserObj->save();
        return redirect('/admin');
    }
}
