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
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>edit</th>
                        <th>delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($st as $s)
                        <tr>

                            <td>{{ $s->name }}</td>
                            <td>{{ $s->phone_number }} </td>
                            <td>{{ $s->DOB }}</td>
                            <td>{{ $s->gender}}</td>
                            <td>{{ $s->address }}</td>
                            <td>{{ $s->Email }}</td>

                            <td> <a href={{ 'update/' . $s['id'] }} class="btn btn-success">edit</a>

                            </td>
                            <td><a href={{ 'delete/' . $s['id'] }} class="btn btn-danger ">delete</a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
