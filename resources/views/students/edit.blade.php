@extends('layout.master')

@section('title','Edit Details')

@section('content')
    @include('students.form',[ 'action' => route('students.update', $student->id), 'edit' => true ])
@endsection