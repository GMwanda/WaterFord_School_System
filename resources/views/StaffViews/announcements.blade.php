@extends('layouts.staffLayout')
<style>
    #s_btn{
        background-color: 39829B;
    }
</style>
@section('staff-content')
<div class="flex flex-col justify-center items-center">
    <h1>Make Announcement</h1>
    <form class="flex flex-col items-center border border-red-700 h-3/5 my-11 px-5 py-3 rounded-md shadow-sm" action="">
        <div class="my-4">
            <label class="text-lg" for="t_heading">Announcement</label> <br> <br>
            {{-- <input multiple type="text" name="t_heading" id="t_heading" class="rounded-lg h-9 border border-solid bg-gray-50 px-2 w-52"> --}}
            <textarea name="t_announcement" id="" cols="30" rows="10" class=" border border-solid rounded-md p-2">Text Here</textarea>
        </div>
        <button id="s_btn" class="btn text-white hover:scale-75 transition duration-150 ease-in-out delay-150">Submit</button>
    </form>
</div>


@endsection