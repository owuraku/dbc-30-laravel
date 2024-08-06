@extends('layout.master')
@section('title','List of Students')

@section('content')

{{-- <div class="d-flex justify-content-center"> --}}
  <a class="btn btn-lg btn-primary mb-3" href="{{route('students.create')}}" >Add New Student</a>
{{-- </div> --}}

<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">StudentID</th>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Gender</th>
        <th scope="col">Course</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr>
        <th scope="row"> {{ $student->student_id }} </th>
        <td>{{ $student->firstname }}</td>
        <td>{{ $student->lastname }}</td>
        <td>{{ $student->gender }}</td>
        <td>{{ $student->course->name }}</td>
        <td>
            <a href="{{route('students.show', $student->id)}}" class="btn btn-outline-primary">View</a>
            <a href="{{route('students.edit', $student->id)}}" class="btn btn-outline-success">Edit</a>
            <x-deletebutton :action="route('students.destroy', $student->id)"  />
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
  @endsection