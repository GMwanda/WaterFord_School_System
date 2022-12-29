@extends('layouts.staffLayout')
@section('staff-content')
<style>
    #t_heading:focus{
        border: none;
    }
    #s_btn{
        background-color: 39829B;
    }
</style>
<div class="flex flex-col justify-center items-center">
    <h1>Add Assignment</h1>
    <form class="flex flex-col items-center border border-red-700 h-96 my-11 px-5 py-3 rounded-md shadow-sm" action="{{ url('/assignment/upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="my-4">
            <label for="t_heading">Heading</label>
            <input type="text" value="{{$courseId->id}}" hidden name="t_courseId">
            <input type="text" name="t_heading" id="t_heading" class="rounded-lg h-9 border border-solid bg-gray-50 px-2 w-52">
        </div>
        <div class="my-4">
            <label for="t_description">Description</label><br>
            {{-- <input multiple type="text" name="t_heading" id="t_heading" class="rounded-lg h-9 border border-solid bg-gray-50 px-2 w-52"> --}}
            <textarea class="border-2" name="t_description" id="t_description" cols="40" rows="5"></textarea>
        </div>
        <div class="my-4">
            <label for="t_dueDate">Due Date</label>
            <input type="datetime-local" name="t_dueDate" id="t_dueDate" class="rounded-lg h-9 border border-solid bg-gray-50 px-2 w-52">
        </div>
        <div class="my-4">
            <label class=" mb-2 text-sm font-medium text-gray-900"  for="assignmentFile">Upload file</label>
            <input multiple class=" w-56 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="assignmentFile" name="assignmentFile" type="file">
        </div> <br>
        <button type="submit" id="s_btn" class="btn bg-cyan-700 text-white hover:scale-75 ">Finish</button>
    </form>
</div>






@endsection