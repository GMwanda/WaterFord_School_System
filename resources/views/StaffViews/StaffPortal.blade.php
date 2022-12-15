@extends('layouts.staffLayout');
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=734&q=80"
 --}}
@section('staff-img')
    <img class="object-cover w-24 h-24 mx-2 rounded-full" src="{{ asset('Images/'.$lecturer->image)}}" alt="avatar">
@endsection
@section('staff-content')
    <div class=" container flex items-center space-x-2 font-semibold text-gray-900 leading-8">
            {{-- <span clas="text-green-500">
                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </span> --}}
            <span class="tracking-wide">About</span>

        </div>
        <div class="text-gray-700">
            <div class="grid md:grid-cols-2 text-sm">
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Name</div>
                    <div class="px-4 py-2">{{$lecturer->name}}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Gender</div>
                    <div class="px-4 py-2">{{$lecturer->gender}}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Contact No.</div>
                    <div class="px-4 py-2">{{$lecturer->phone_number}}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Address</div>
                    <div class="px-4 py-2">{{$lecturer->address}}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Email</div>
                    <div class="px-4 py-2">
                        <a class="text-blue-800" href="mailto:{{$lecturer->email}}">{{$lecturer->email}}</a>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Birthday</div>
                    <div class="px-4 py-2">{{$lecturer->DOB}}</div>
                </div>
            </div>
        </div>
        <br> <br> <br>
        <span id="lecturers" class="tracking-wide font-bold">Your Lectures</span>
            <div class=" flex flex-row flex-wrap">
                @foreach ($lecturers as $lecture)
                <x-class-card :lecture="$lecture" /> 
                @endforeach
            </div>
            
@endsection