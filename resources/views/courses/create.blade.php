@extends('layout.master')

@section('title','Create New Course')

@section('content')
    @include('courses.form',[ 'action' => route('courses.store') ])
@endsection