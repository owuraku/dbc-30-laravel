@extends('layout.master')

@section('title','Create New User')

@section('content')
    @include('users.form',[ 'action' => route('users.store') ])
@endsection