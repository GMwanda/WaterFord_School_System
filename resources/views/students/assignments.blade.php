{{-- <link rel="stylesheet" type="text"  href="{{asset('storage') }}"> --}}
@extends('students.studentlayout')
@section('std_content')
<head>


<link rel="stylesheet" href="/ProgramStyling/app.css">
</head>

  
   
    <h3 class="text text-primary text-center mt-5">assignments</h3>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                          <th>title</th>
                          <th>Description</th>
                          <th>Due_date</th>
                          <th>file</th>
                         

                    </tr>
                </thead>
                <tbody>
                     @foreach ($as as $s)
                         
                    
                    <tr>
                        
                        <td>{{$s->Title }}</td>
                        <td>{{$s->Description}} </td>
                        <td>{{$s->Due_Date}} </td>
                        {{-- <td>{{asset('Assignments/'.{{$s->AssignmentFile}})}}</td> --}}
                        <td>@php
                            $f = $s->AssignmentFile;
                            $v = Storage::url($f);
                        @endphp
                        <a href="{{$v}}">{{$v}}</a>
                        </td>
                          
               
                    </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>
    @endsection