@extends('students.studentlayout')
@section('std_content')
<head>


<link rel="stylesheet" href="/ProgramStyling/app.css">
</head>
<style>
td{
    padding: 4px !important;
}
</style>

    <div class="row mt-5">
        <div class="col-md-5 offset-md-3">
            <h3 class="text text-center text-primary">Add details</h3>
            <form action="/st_add" method="POST" class="form-group">
                @csrf
            <table class="table table-borderless">
                <tr>
                    <td>Student Name</td>
                    <td><input type="readonly" name="Name" class="form-control" value="{{ Auth::user()->name }}"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="Phone" class="form-control" value=""></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>
                        <input type="date" name="Birth" class="form-control" value=""> 
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <label><input type="radio" name="Gender" value="male">Male</label>
                        <label><input type="radio" name="Gender" value="female">Female</label>
                    </td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td><input type="text" name="cl" class="form-control" value=""></td>
                        
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="Address" class="form-control" value=""></td>
                </tr>
                <tr>
                    <td>Father Name</td>
                    <td>
                      <input type="text" name="FatherName" class="form-control" value="">
                    </td>
                </tr>
                <tr>
                    <td>Father Phone</td>
                    <td><input type="text" name="FatherPhone" class="form-control" value=""></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="Status" id="" class="form-control">
                            <option value="married">married</option>
                            <option value="single">single</option>
                        </select>
                    </td>   
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="save"  name="saveStudent" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
        </div>
    </div>
    @endsection