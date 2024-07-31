@extends('layout.master')

@section('title','Create New Student')

@section('content')
    @include('students.form',[ 'action' => route('students.store') ])
@endsection