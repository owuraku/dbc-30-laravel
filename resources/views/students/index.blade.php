@extends('layout.master')
@section('title','List of Students')

@section('content')

{{-- <div class="d-flex justify-content-center"> --}}
    <a class="btn btn-lg btn-primary mb-3" href="{{route('students.create')}}" >Add New Student</a>
{{-- </div> --}}


<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>
            <a href="{{route('students.show', 1)}}" class="btn btn-outline-primary">View</a>
            <a href="{{route('students.edit', 1)}}" class="btn btn-outline-success">Edit</a>
            <button type="button" class="btn btn-outline-danger">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
  @endsection