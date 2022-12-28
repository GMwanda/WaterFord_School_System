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
            <h3 class="text text-center text-primary">register units</h3>
            <form action="add_units" method="POST" class="form-group">
                @csrf
            <table class="table table-borderless">
                <tr>
                    <td>Student Name</td>
                    <td><input type="text" name="Name" class="form-control" value="{{ Auth::user()->name }}"></td>
                </tr>
               
                
                <tr>
                    <td>Class</td>
                    <td>
                        <label><input type="radio" name="class" value="2A">2A</label>
                        <label><input type="radio" name="class" value="2B">2B</label>
                        <label><input type="radio" name="class" value="2C">2C</label>
                    </td>
                </tr>
                
                
                
               
                <tr>
                    <td>Available_units</td>
                    <td>
                        <select name="units" id="" class="form-control">
                            <option value="linear_algebra">linear_algebra</option>
                            <option value="linear_algebra">inear_algebra</option>
                            <option value="probability">probability</option>
                            <option value="integral">integral</option>
                            <option value="economics">economics</option>
                            <option value="physics">physics</option>
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