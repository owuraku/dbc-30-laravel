
@extends('layout.master')

@section('title','Edit '.$course->name)

@section('content')
    @include('courses.form',[ 
        'action' => route('courses.update', $course->id), 
        'edit' => true ]
        )
@endsection