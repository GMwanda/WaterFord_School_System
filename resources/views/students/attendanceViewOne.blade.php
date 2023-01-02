@extends('students.studentlayout')
@section('std_content')
<head>


<link rel="stylesheet" href="/ProgramStyling/app.css">
</head>

  
   
    <h3 class="text text-primary text-center mt-5">Attendace</h3>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                          <th>class Id </th>
                          <th>Date</th>
                          <th>Hours</th>
                          <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($Course as $s)
                        
                    
                    <tr>
                        <td>{{ $s->Course }}</td>
                        <td>{{ $s->Date }}</td>
                        
                          <td>{{$s->Hours}} </td>
                          <td>Present</td>
               
                    </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>
    @endsection