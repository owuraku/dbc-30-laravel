<form class="container-sm" action="{{$action}}" method="POST">
    <x-textfield 
    name="name" 
    label="Course Name" 
    type="text"
    :value="$course->name"
    placeholder="Enter a course name" />


    <h4>Select Subjects</h4>
    <div class="row row-cols-3 mb-3">
        @foreach($subjects as $subject)
        <x-inputswitch :subjects="$course->subjects"  :label="$subject->name" name="subject_id[]" :value="$subject->id" />
        @endforeach
    </div>

    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
