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
        <th scope="col">No. of Subjects</th>
        <th scope="col">Subjects</th>

        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($courses as $course)
      <tr>
        <th scope="row"> {{ $course->id }} </th>
        <td>{{ $course->name }}</td>
        <td>{{ $course->subjects->count() }}</td>       
        <td>
            @foreach ($course->subjects as $subject)
                <span>{{$subject->name}}</span>
            @endforeach  
        </td>       

        <td>
            <a href="{{route('courses.show', $course->id)}}" class="btn btn-outline-primary">View</a>
            <a href="{{route('courses.edit', $course->id)}}" class="btn btn-outline-success">Edit</a>
            @if($course->trashed())
            <x-deletebutton :action="route('courses.destroy', $course->id)" label="Force Delete"  />
            @else
            <x-deletebutton :action="route('courses.destroy', $course->id)"  />
            @endif
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
  {{ $courses->links()}}
  @endsection