@extends('students.studentlayout')
@section('std_content')
<head>


<link rel="stylesheet" href="/ProgramStyling/app.css">
</head>

  
   
    <h3 class="text text-primary text-center mt-5">List of registered_units</h3>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                          <th>class </th>
                          <th>units </th>
                         

                    </tr>
                </thead>
                <tbody>
                     @foreach ($r as $s)
                         
                    
                    <tr>
                        
                        <td>{{ $s->Class }}</td>
                        
                          <td>{{$s->units}} </td>
                          
               
                    </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>
    @endsection