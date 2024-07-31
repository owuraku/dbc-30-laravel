@extends('layout.master')

@section('title','Create New Course')

@section('content')
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}

    @include('courses.form',[ 'action' => route('courses.store') ])
@endsection