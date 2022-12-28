@extends('students.studentlayout')
@section('std_content')
<head>


<link rel="stylesheet" href="/ProgramStyling/app.css">
</head>

  
   
    <h3 class="text text-primary text-center mt-5">{{ Auth::user()->name }}details</h3>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                          <th>Name </th>
                          <th>Phone </th>
                          <th>Birth</th>
                          <th>Gender</th>
                          <th>Address</th>
                          <th>fatherName</th>
                          <th>fatherPhone</th>
                          <th>Status</th>
                          <th>edit</th>
                          <th>delete</th>

                    </tr>
                </thead>
                <tbody>
                     @foreach ($st as $s)
                         
                    
                    <tr>
                        
                        <td>{{ $s->Name }}</td>
                        
                          <td>{{$s->Phone}} </td>
                          <td>{{$s->Birth}}</td>
                          <td>{{$s->Gender}}</td>
                          <td>{{$s->Address}}</td>
                          <th>{{$s->fatherName}}</td>
                          <td>{{$s->fatherPhone}}</td>
                          <td>{{$s->Status}}</td>
                           <td> <a href={{"update/". $s['id']}}  class="btn btn-success">edit</a>
                            
                        </td>
                        <td><a href={{"delete/". $s['id']}}  class="btn btn-danger ">delete</a></td>
               
                    </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>
    @endsection