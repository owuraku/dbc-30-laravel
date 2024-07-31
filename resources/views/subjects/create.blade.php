@extends('layout.master')

@section('title','Create New Subject')

@section('content')
    @include('subjects.form',[ 'action' => route('subjects.store') ])
@endsection