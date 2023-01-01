@extends('layouts.staffLayout')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
    a:hover {
        cursor: pointer;
    }

    #container {
        display: grid;
        column-gap: 22px;
        grid-template-columns: 25fr 175fr;
    }
</style>

@section('content')
    <div id="container" class=" container grid w-screen">

        <div class=" col-start-1 col-end-2 flex flex-col w-72 h-screen py-8  ">
            <h2 class="text-3xl font-semibold text-center text-gray-800 ">ADMINISTRATOR'S PORTAL</h2>

            <div class="flex flex-col justify-between flex-1 mt-6">
                <nav>
                    <a class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 hover:underline  no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <span class="mx-4 font-medium">Dashboard</span>
                    </a>


                    <div class=" left-0 w-full">
                        <ul id="std-mgt-submenu"
                            class="rounded px-0 w-full relative text-center text-gray-700 no-underline ">
                            <li onClick="document.location.href='{{ route('register') }}';"
                                class=" my-0 h-12 border-b border-b-slate-900 pt-3 w-full hover:bg-gray-200 hover:text-gray-700">
                                {{ __('Register') }}</li>
                            
                            {{-- /* <li onclick="document.location.href='{{route('assigningunits')}}';" class=" my-0 h-12 border-b pt-3 w-full hover:bg-gray-200 hover:text-gray-700">Assigning units</li> */ --}}
                        </ul>
                    </div>

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="flex no-underline hover:underline items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform  hover:bg-gray-200   hover:text-gray-700"
                        href="#">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <span class="mx-4 font-medium">Logout</span>
                    </a>
                </nav>



            </div>
        </div>

        <div class="text-gray-700 mt-6">
            <div class="grid md:grid-cols-2 text-lg">
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Name</div>
                    <div class="px-4 py-2">{{ $lecturer->name }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Gender</div>
                    <div class="px-4 py-2">{{ $lecturer->gender }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Contact No.</div>
                    <div class="px-4 py-2">{{ $lecturer->phone_number }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Address</div>
                    <div class="px-4 py-2">{{ $lecturer->address }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Email</div>
                    <div class="px-4 py-2">
                        <a class="text-blue-800" href="mailto:{{ $lecturer->email }}">{{ $lecturer->email }}</a>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Birthday</div>
                    <div class="px-4 py-2">{{ $lecturer->DOB }}</div>
                </div>
            </div>
        </div>

    </div>
@endsection
