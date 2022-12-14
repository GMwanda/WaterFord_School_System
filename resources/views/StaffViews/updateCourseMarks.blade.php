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
        {{-- action="/coursework/update-marks" --}}
    <form id="coursemarks_form" action="/coursework/update-marks" method="post">
        <tbody>
        @csrf
        <div class="my-4">
            <label class="font-bold mx-2" for="t_assessment">Name of assessment</label>
            <input id="t_assessment" class="form-group border border-solid rounded-md h-10 border-slate-600 pl-3" type="Text" name="t_assessment" placeholder="Assessment">
            <br>
            <br>
            <label class="font-bold mx-2" for="t_total">Total</label>
            <input type="text" class="form-group border border-solid rounded-md h-10 border-slate-600 pl-3" name="t_total" id="t_total" placeholder="Total">
            <input type="text" class="form-group" hidden value="{{$courseId->id}}" name="t_courseId" id="t_courseId">
            <span class="alert alert-success mb-3" role="alert" id="successMsg" style="display: none">Updated</span>
            <span class="alert alert-danger mb-3" role="alert" id="errorMsg" style="display: none"></span>  
        </div>
     
                @foreach ($Students as $student)
                <tr>
                    <td>{{$student->UserId}}</td>
                    <td>{{$student->name}}</td>
                    <td>
                        <input  class="t_stdId form-group text-red-900" type="text" disabled hidden name="t_stdId" id="t_stdId" value="{{$student->UserId}}">
                        <input class="t_marks border border-black rounded-lg pl-3 h-10" type="text" name="t_marks" id="t_marks" placeholder="Input Marks"> 
                        {{-- <button id="btnModal" data-toggle="modal" data-target="#marksModal" class="btnModal btn btn-secondary">Select</button> --}}
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
                                  }
                                });
                        }
                        
                    }
                    
                    // let va = ha
                    // .filter(function (){
                    //     if(this.value != ""){
                    //         return this;
                    //     }
                    // }).map(function(){
                    //     return this.value
                    // }).get();
                    // console.log(va);
                });


            });

        </script>
@endsection
  
  <!-- Modal -->
  <div class="modal fade" id="marksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>