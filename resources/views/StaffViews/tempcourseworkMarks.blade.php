@extends('layouts.staffLayout')
@section('staff-content')
<div class=" flex flex-row flex-wrap">
    @foreach ($lecturers as $lectur)
    <x-class-card :lecture="$lectur" /> 
    @endforeach
</div>
@endsection