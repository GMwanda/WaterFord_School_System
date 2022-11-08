@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('content')
    {{-- <H2>STAFF PORTAL</H2> --}}
    {{-- DASHBOARD --}}
<div class=" grid col-auto">
    <div class=" col-start-1 col-end-2 flex flex-col w-64 h-screen py-8 bg-white border-r dark:bg-gray-900 dark:border-gray-700">
        <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">STAFF PORTAL</h2>
    
        <div class="flex flex-col items-center mt-6 -mx-2">
            <img class="object-cover w-24 h-24 mx-2 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=734&q=80" alt="avatar">
            <h4 class="mx-2 mt-2 font-medium text-gray-800 dark:text-gray-200 hover:underline">John Doe</h4>
            <p class="mx-2 mt-1 text-sm font-medium text-gray-600 dark:text-gray-400 hover:underline">john@example.com</p>
        </div>
    
        <div class="flex flex-col justify-between flex-1 mt-6">
            <nav>
                <a class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 dark:bg-gray-800 dark:text-gray-200" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    <span class="mx-4 font-medium">Dashboard</span>
                </a>
    
                <a id="student_mgt" class="grid col-auto items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" fill="currentColor" class=" my-1 inline bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                    </svg>
                    <span class=" row-start-2 row-end-3 col-start-1 col-end-2 mx-4 my-0 font-medium">Student Management</span>
                    <div class=" left-0">
                        <ul id="std-mgt-submenu" class=" border rounded px-0 w-62 relative text-center text-gray-700 no-underline ">
                            <li class=" my-3 border-b-2 border-b-black">Update Attendance</li>
                            <li>Update Coursework Marks</li>
                        </ul>
                    </div>
                </a>
                <script>
                    $(document).ready(function () {
                        $("#std-mgt-submenu").hide();
                    });
                    $("#student_mgt").hover(function () {
                            // over
                            $("#std-mgt-submenu").show();
                        }, function () {
                            // out
                            $("#std-mgt-submenu").hide();
                        }
                    );
                </script>
                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-month-fill" viewBox="0 0 16 16">
                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zm.104 7.305L4.9 10.18H3.284l.8-2.375h.02zm9.074 2.297c0-.832-.414-1.36-1.062-1.36-.692 0-1.098.492-1.098 1.36v.253c0 .852.406 1.364 1.098 1.364.671 0 1.062-.516 1.062-1.364v-.253z"/>
                        <path d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM2.56 12.332h-.71L3.748 7h.696l1.898 5.332h-.719l-.539-1.602H3.1l-.54 1.602zm7.29-4.105v4.105h-.668v-.539h-.027c-.145.324-.532.605-1.188.605-.847 0-1.453-.484-1.453-1.425V8.227h.676v2.554c0 .766.441 1.012.98 1.012.59 0 1.004-.371 1.004-1.023V8.227h.676zm1.273 4.41c.075.332.422.636.985.636.648 0 1.07-.378 1.07-1.023v-.605h-.02c-.163.355-.613.648-1.171.648-.957 0-1.64-.672-1.64-1.902v-.34c0-1.207.675-1.887 1.64-1.887.558 0 1.004.293 1.195.64h.02v-.577h.648v4.03c0 1.052-.816 1.579-1.746 1.579-1.043 0-1.574-.516-1.668-1.2h.687z"/>
                      </svg>
                    <span class="mx-4 font-medium">Timetable</span>
                </a>
    
                <a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    <span class="mx-4 font-medium">Logout</span>
                </a>
            </nav>
        </div>
    </div>
    {{-- END OF DASHBOARD --}}

    {{-- ABOUT/ RIGHT SIDE --}}
    <div class=" col-start-2 col-end-3 bg-white p-3 shadow-sm rounded-sm">
        {{-- <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
            <span clas="text-green-500">
                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </span>
            <span class="tracking-wide">About</span>
        </div> --}}
        <div class="text-gray-700">
            <div class="grid md:grid-cols-2 text-sm">
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">First Name</div>
                    <div class="px-4 py-2">John</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Last Name</div>
                    <div class="px-4 py-2">Doe</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Gender</div>
                    <div class="px-4 py-2">Male</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Contact No.</div>
                    <div class="px-4 py-2">+11 998001001</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Current Address</div>
                    <div class="px-4 py-2">Beech Creek, PA, Pennsylvania</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Permanant Address</div>
                    <div class="px-4 py-2">Arlington Heights, IL, Illinois</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Email.</div>
                    <div class="px-4 py-2">
                        <a class="text-blue-800" href="mailto:jane@example.com">jane@example.com</a>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Birthday</div>
                    <div class="px-4 py-2">Feb 06, 1998</div>
                </div>
            </div>
        </div>
        <button
            class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
            Full Information</button>
    </div>
    {{-- END OF ABOUT --}}
</div>
@endsection