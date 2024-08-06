@extends('layout.master')

@section('title','Edit User')

@section('content')
    @include('users.form',[ 'action' => route('users.update', $user->id), 'edit' => true])
@endsection