<form class="container-sm" action="{{$action}}" method="POST">
    <x-textfield 
    name="name" 
    label="Course Name" 
    type="text"
    :value="$course->name"
    placeholder="Enter a course name" />

    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
