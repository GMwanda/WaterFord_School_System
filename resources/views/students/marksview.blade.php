@extends('students.studentlayout')
@section('std_content')
<head>


<link rel="stylesheet" href="/ProgramStyling/app.css">
</head>

  
   
    <h3 class="text text-primary text-center mt-5">{{ Auth::user()->name }} Marks</h3>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                          <th>MARKS </th>
                          <th>Assessment </th>
                          

                    </tr>
                </thead>
                <tbody>
                     @foreach ($users as $user)
                         
                    
                    <tr>
                        
                        <td>{{ $user->Marks }}</td>
                        
                          <td>{{$user->Assessment}} </td>
                          
               
                    </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>
    @endsection