<head>


<link rel="stylesheet" href="/ProgramStyling/app.css">
</head>
<div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h3 class="text text-center text-primary">Update Student</h3>
            <form action="{{"/updated/". $st['id']}}" method="POST" class="form-group">
                @csrf
            <table class="table table-borderless">
           
                <tr>
                    <td>Student Name</td>
                    <td><input type="text" name="Name" class="form-control" value="{{ $st->Name }}"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="Phone" class="form-control" value="{{ $st->Phone }}"></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>
                        <input type="date" name="Birth" class="form-control" value="{{ $st->Birth }}"> 
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <label><input type="radio" name="Gender" value="Male">Male</label>
                        <label><input type="radio" name="Gender" value="Female">Female</label>
                    </td>
                </tr>
                <tr>
                    
                    <td>Class</td>
                    <td><input type="text" name="cl" class="form-control" value="{{ $st->class }}"></td>
                        
                            
                           
                        
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="Address" class="form-control" value="{{ $st->Address }}"></td>
                </tr>
                <tr>
                    <td>Father Name</td>
                    <td>
                      <input type="text" name="FatherName" class="form-control" value="{{ $st->fatherName }}">
                    </td>
                </tr>
                <tr>
                    <td>Father Phone</td>
                    <td><input type="text" name="FatherPhone" class="form-control" value="{{ $st->fatherPhone }}"></td>
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
                    <td><input type="submit" value="Update Student Info" name="updateStudent" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
        </div>
    </div>