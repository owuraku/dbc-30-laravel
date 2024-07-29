@extends('layout.master')
@section('title','List of subjects')

@section('content')

{{-- <div class="d-flex justify-content-center"> --}}
  <a class="btn btn-lg btn-primary mb-3" href="{{route('subjects.create')}}" >Add New Subject</a>
{{-- </div> --}}

<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">SubjectID</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($subjects as $subject)
      <tr>
        <th scope="row"> {{ $subject->id }} </th>
        <td>{{ $subject->name }}</td>
       
        <td>
            <a href="{{route('subjects.show', $subject->id)}}" class="btn btn-outline-primary">View</a>
            <a href="{{route('subjects.edit', $subject->id)}}" class="btn btn-outline-success">Edit</a>
            <button type="button" class="btn btn-outline-danger">Delete</button>
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
  @endsection