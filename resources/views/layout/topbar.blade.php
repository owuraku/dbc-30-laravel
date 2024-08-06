   {{-- start nav --}}
   <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">DBC30 SMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Dashboard</a>
          <a class="nav-link" href="{{route('students.index')}}">Students</a>
          <a class="nav-link" href="{{route('courses.index')}}">Courses</a>
          <a class="nav-link" href="{{route('subjects.index')}}">Subjects</a>

          @if(Auth::user()->isSuperAdmin())
          <a class="nav-link" href="{{route('users.index')}}">Users</a>
          @endif

          @auth
          <form action="{{route('auth.logout')}}" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Logout</button>
          </form>
          @endauth
          
        </div>
      </div>
    </div>
  </nav>
{{-- end nav --}}