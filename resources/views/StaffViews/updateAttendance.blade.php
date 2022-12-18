@extends('layouts.staffLayout')
@section('staff-content')
    <h1>{{$courseName}}</h1>
    <table class=" table">
        <thead>
            <tr>
                <th>Admission Number</th>
                <th>Name</th>
                <th>Mark</th>
                {{-- <th>Submit</th> --}}
            </tr>
        </thead>
        
    <form id="attendance_form" action="/attendance/update-attendance" method="POST">
        <tbody>
        @csrf
        <div class="my-4">
            <label class="font-bold mx-2" for="date">Date</label>
            <input id="t_date" class="form-group border border-solid rounded-md h-10 border-slate-600 focus:bg-blue-200" type="date" name="t_date">
            <input type="text" class="form-group" hidden value="{{$courseId->id}}" name="t_courseId" id="t_courseId">
            <span class="alert alert-success mb-3" role="alert" id="successMsg" style="display: none">Updated</span>
            <span class="alert alert-danger mb-3" role="alert" id="errorMsg" style="display: none"></span>  
        </div>
                @foreach ($Students as $student)
                <tr>
                    <td>{{$student->UserId}}</td>
                    <td>{{$student->name}}</td>
                    <td>
                        <input class="form-group" type="checkbox" name="t_status" id="t_status" value="{{$student->UserId}}">
                        <input class="form-group" type="text" name="t_stdId" id="t_stdId"> 
                    </td>
                    </tr>
                @endforeach
            </tbody>
            <button id="btn_finish" class="btn btn-secondary" type="submit">Finish</button>
            </form>
        </table>
        
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        $(document).ready(function () {
            let stdId;
            let checkboxes = $("input[type=checkbox][name=t_status]")
            let enabledStatus = [];
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
                }
            });
            $("#btn_finish").click(function (e) { 
                e.preventDefault();
                enabledStatus = checkboxes.filter(":checked").map(function (){
                    stdId = this.value;
                    console.log(stdId);
                    $.ajax({
                        type: "post",
                        url: "{{ url('/attendance/update-attendance') }}",
                        data: {
                            Date:$("#t_date").val(),
                            CourseId:$("#t_courseId").val(),
                            StudentId:stdId
                        },
                        success: function (response) {
                            $("#successMsg").fadeIn();
                            $("#successMsg").fadeOut();
                        },
                        error: function(xhr, status, error) {
                          var err = JSON.parse(xhr.responseText);
                          err.message = "Date is missing";
                          console.log(err.message);
                          let msg = err.message
                          $("#errorMsg").html(err.message);
                          $("#errorMsg").fadeIn("slow");
                          $("#errorMsg").fadeOut("slow");
                        }
                    });
                });
            });
        });
    </script>
@endsection