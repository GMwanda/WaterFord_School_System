@extends('layouts.stafflayout')
@section('staff-content')
    <h1>Attendance</h1>
        <div class=" flex flex-row flex-wrap">
          @foreach ($lecturers as $lecturer)
            <div id="card" class=" w-60 mx-7 my-4 overflow-hidden rounded-xl cursor-pointer bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
              <div class="p-5 ">
                <p class=" text-center font-bold">{{$lecturer->course_name}}</p>
                <p class="text-medium font-light text-opacity-60 text-center mb-5 text-gray-700">{{$lecturer->faculty_name}}</p>
                <button onClick="document.location.href='{{route('Attendance.markAttenanceView', [$lecturer->course_name])}}';" class="w-full rounded-md bg-blue-500  py-2 text-indigo-100 hover:bg-indigo-500 hover:shadow-md duration-75">Mark Attendance</button>
              </div>
            </div>
          @endforeach
        </div>


@endsection