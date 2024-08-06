@extends('layout.master')
@section('title','List of Users')

@section('content')

{{-- <div class="d-flex justify-content-center"> --}}
  <a class="btn btn-lg btn-primary mb-3" href="{{route('users.create')}}" >Add New User</a>
{{-- </div> --}}

<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">Fullname</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row"> {{ $user->fullname }} </th>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>
            <a href="{{route('users.show', $user->id)}}" class="btn btn-outline-primary">View</a>
            <a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-success">Edit</a>
            <x-deletebutton :action="route('users.destroy', $user->id)"  />
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
  @endsection