@extends('layouts.staffLayout')
<style>
  #btn_submit:hover{
    transform: scale(1.05);
    transition: ease-in-out;
    transition-duration: 0.15s
  }
</style>
@section('staff-content')

    <h1>{{$courseName}}</h1>
    <table class=" table">
        <thead>
            <tr>
                <th>Admission Number</th>
                <th>Name</th>
                <th>Marks</th>
                {{-- <th>Submit</th> --}}
            </tr>
        </thead>
        <tbody>
        <form id="coursemarks_form" action="/coursework/update-marks" method="post">
        
        @csrf
        <div class="my-4">
            <label class="font-bold mx-2" for="t_assessment">Name of assessment</label>
            <input id="t_assessment" class="form-group border border-solid rounded-md h-10 border-slate-600 pl-3" type="Text" name="t_assessment" placeholder="Assessment" required>
            <label class="font-bold ml-5" for="t_total">Total</label>
            <input type="text" class="form-group border border-solid rounded-md h-10 border-slate-600 pl-3" name="t_total" id="t_total" placeholder="Total" required>
            <input type="text" class="form-group" hidden value="{{$courseId->id}}" name="t_courseId" id="t_courseId">
            <span class="alert alert-success mb-3" role="alert" id="successMsg" style="display: none">Updated</span>
            <span class="alert alert-danger mb-3" role="alert" id="errorMsg" style="display: none">Error</span>  
        </div>
     
                @foreach ($Students as $student)
                <tr>
                    <td>{{$student->UserId}}</td>
                    <td>{{$student->name}}</td>
                    <td>
                        <input  class="t_stdId form-group text-red-900" type="text" disabled hidden name="t_stdId" id="t_stdId" value="{{$student->UserId}}">
                        <input class="t_marks border border-black rounded-lg pl-3 h-10" type="text" name="t_marks" id="t_marks" placeholder="Marks"> 
                    </td>
                    </tr>
                @endforeach
            </tbody>
            <button id="btn_submit" class="border h-10 rounded-xl text-white bg-blue-500 border-slate-900 w-24 text-center shadow-md">Finish</button>
            </form>
            
        </table>
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <script>
            $(document).ready(function () {
                $("#btn_submit").click(function (e) { 
                    e.preventDefault();
                    let ha = $(".t_marks");
                    class Student {
                        constructor(stdId, marks){
                            this.stdId = stdId;
                            this.marks = marks;
                        }
                    };
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
                        }
                    });
                    for(i = 0; i < ha.length; i++){
                        if(ha[i].value != ""){
                            let el = $(".t_stdId").get(i);
                            var id = el.value;
                            let marks = ha[i].value;
                            var temp = new Student(id, marks);
                            console.log($("#t_assessment").val());
                            console.log("id "+temp.stdId+" marks "+temp.marks);
                            $.ajax({
                                  type: "post",
                                  url: "{{ url('/coursework/update-marks') }}",
                                  data: {
                                    Assessment: $("#t_assessment").val(),
                                    stdId:temp.stdId,
                                    marks:temp.marks,
                                    total:$("#t_total").val(),
                                    CourseId:$("#t_courseId").val(),
                                  },
                                  success: function (response) {
                                    $("#successMsg").fadeIn();
                                    $("#successMsg").fadeOut();
                                  },
                                  error: function(xhr, status, error){
                                    // alert('Ensure that the "Assessment" and "Total" are not empty');
                                    let t = error;
                                    if(t == 'Internal Server Error'){
                                      $("#errorMsg").text("Name of Assessment or Total is missing");
                                      $("#errorMsg").fadeIn();
                                    $("#errorMsg").fadeOut(7000);
                                    } else {
                                      $("#errorMsg").fadeIn();
                                    $("#errorMsg").fadeOut();
                                    }
                                    console.log(error);
                                  }
                                });
                        }
                        
                    }
                });
                $("#btn_moreOptions").click(function (e) { 
                  e.preventDefault();
                  $(".modal").show();
                });
            });
        </script>

  <!-- component -->
{{-- <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" /> --}}

<!-- This is an example component -->
<div class="max-w-2xl mx-auto">
 
    <!-- Modal toggle -->
    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="updateMarks-modal">
    Change Marks
    </button>

    <!-- Main modal -->
    <div id="updateMarks-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal top-4 left-0 right-0  z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative">
                <div class="flex justify-end p-2">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="updateMarks-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="/coursework/change-marks" method="POST">
                  @csrf
                    <div>
                      <label class="font-bold" for="t_assessement">Name of Assessment</label> <br>
                      <input id="t_assessment" class="form-group border border-solid rounded-md h-10 border-slate-600 pl-3" type="Text" name="t_assessment" placeholder="Assessment" required>
                    </div>
                    <div>
                      <label class="font-bold" for="t_stdId">Student Id</label> <br>
                      <input id="t_stdId" class="form-group border border-solid rounded-md h-10 border-slate-600 pl-3" type="Text" name="t_stdId2" placeholder="Student Id" required>
                    </div>
                    <div>
                      <label class="font-bold" for="t_marks">Marks</label> <br>
                      <input id="t_marks" class="form-group border border-solid rounded-md h-10 border-slate-600 pl-3" type="Text" name="t_marks" placeholder="Marks" required>
                    </div>
                    <div>
                      <label class="font-bold ml-5" for="t_total">Total</label>
                      <input type="text" class="form-group border border-solid rounded-md h-10 border-slate-600 pl-3" name="t_total" id="t_total" placeholder="Total" required>
                      <input type="text" class="form-group" hidden value="{{$courseId->id}}" name="t_courseId" id="t_courseId">
                      <input type="text" class="form-group" hidden value="{{$courseName}}" name="t_courseName" id="t_courseName">
                    </div>
                    <div class="modal-footer">
                      <button onclick="document.location.href='{{ route('courseMarks.change') }}';" id="btn_changeMarks" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>

<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
@endsection
