<form class="container-sm" action="{{$action}}" method="POST">
    <x-textfield 
    name="name" 
    label="Course Name" 
    type="text" 
    placeholder="Enter a course name" />

    @csrf
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>