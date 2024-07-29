@extends('layout.master')
@section('title','List of courses')

@section('content')

{{-- <div class="d-flex justify-content-center"> --}}
  <a class="btn btn-lg btn-primary mb-3" href="{{route('courses.create')}}" >Add New Course</a>
{{-- </div> --}}

<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">CourseID</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($courses as $course)
      <tr>
        <th scope="row"> {{ $course->id }} </th>
        <td>{{ $course->name }}</td>
       
        <td>
            <a href="{{route('courses.show', $course->id)}}" class="btn btn-outline-primary">View</a>
            <a href="{{route('courses.edit', $course->id)}}" class="btn btn-outline-success">Edit</a>
            <button type="button" class="btn btn-outline-danger">Delete</button>
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
  @endsection