@extends('layouts.staffLayout')

@section('staff-content')
<div class=" container flex flex-wrap flex-row ">
    <div id="card" class=" w-96 mx-7 my-4 overflow-hidden rounded-xl cursor-pointer bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
        <div class="p-5 ">
          <p class=" text-center font-bold">Course Name</p>
          <p class="text-medium font-light text-opacity-60 text-center mb-5 text-gray-700">SCES BICS 2B</p>
          <button onclick="document.location.href='{{ route('addNotes') }}';" class="w-full rounded-md bg-blue-500  py-2 text-indigo-100 hover:bg-indigo-500 hover:shadow-md duration-75">Add Notes</button>
        </div>
    </div>
    <div id="card" class=" w-96 mx-7 my-4 overflow-hidden rounded-xl cursor-pointer bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
        <div class="p-5 ">
          <p class=" text-center font-bold">Course Name</p>
          <p class="text-medium font-light text-opacity-60 text-center mb-5 text-gray-700">SCES BICS 2B</p>
          <button class="w-full rounded-md bg-blue-500  py-2 text-indigo-100 hover:bg-indigo-500 hover:shadow-md duration-75">Coursework Marks</button>
        </div>
    </div>
    <div id="card" class=" w-96 mx-7 my-4 overflow-hidden rounded-xl cursor-pointer bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
        <div class="p-5 ">
          <p class=" text-center font-bold">Course Name</p>
          <p class="text-medium font-light text-opacity-60 text-center mb-5 text-gray-700">SCES BICS 2B</p>
          <button onclick="document.location.href='{{ route('announcements') }}';" class="w-full rounded-md bg-blue-500  py-2 text-indigo-100 hover:bg-indigo-500 hover:shadow-md duration-75">Announcement</button>
        </div>
    </div>
    <div id="card" class=" w-96 mx-7 my-4 overflow-hidden rounded-xl cursor-pointer bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
        <div class="p-5 ">
          <p class=" text-center font-bold">Course Name</p>
          <p class="text-medium font-light text-opacity-60 text-center mb-5 text-gray-700">SCES BICS 2B</p>
          <button class="w-full rounded-md bg-blue-500  py-2 text-indigo-100 hover:bg-indigo-500 hover:shadow-md duration-75">Assign Assignment</button>
        </div>
    </div>
</div>



@endsection
