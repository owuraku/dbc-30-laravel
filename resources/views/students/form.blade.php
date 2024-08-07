<form class="container-sm" action="{{$action}}" method="POST" enctype="multipart/form-data">
    <div class="row g-3">
        <div class="col">
            <x-textfield name="firstname" label="Firstname" type="text" :value="$student->firstname" placeholder="Enter student firstname" />
        </div>
        <div class="col">
            <x-textfield name="lastname" :value="$student->lastname" label="Lastname" type="text" placeholder="Enter student lastname" />
        </div>
    </div>   
    <div class="row g-3">
        <div class="col">
            <x-textfield name="student_id" :value="$student->student_id" label="Student ID" type="text" placeholder="Enter student ID" />
        </div>
        <div class="col">
            <x-textfield name="email" :value="$student->email" label="Student Email" type="email" placeholder="Enter student email" />
        </div>
    </div>
    <div class="row g-3">
        @isset($edit)
        <div class="col">
            <label for="">Current Image:</label>
            <img src="{{$student->getImageURL()}}" alt="student image" height="70" width="70">
        </div>
        @endisset
        <div class="col">
            <x-textfield name="image" :value="$student->image" label="Student Image" type="file" placeholder="Upload student image" />
        </div>
    </div>



    @php
        $gender = [
            ['value'=>'male', 'label'=>'Male'],
            ['value'=>'female','label'=>'Female'],
        ];     
    @endphp

    {{-- <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select"  name="gender">
            <option>Select One</option>      
            <option @if('male' == old('gender')) selected @endif value="male">Male</option>
            <option @if('female' == old('gender')) selected @endif value="female">Female</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="course" class="form-label">Course </label>
        <select class="form-select"  name="course_id">
            <option>Select One</option>
            @foreach ($courses as $course)
            <option @if($course['value'] == old('course_id')) selected @endif value="{{$course['value']}}">{{$course['label']}}</option>
            @endforeach
        </select>
    </div> --}}
    
    <x-select-field :options="$gender" name="gender" label="Select Gender" :value="$student->gender" />

    <x-select-field :options="$courses" name="course_id" label="Select Course" :value="$student->course_id"/>

    <x-textfield name="phonenumber" :value="$student->phonenumber" label="Student Phonenumber" type="tel" placeholder="Enter student phonenumber" />
    
    <x-textfield name="dob" label="Student DOB" :value="$student->dob" type="date" placeholder="Enter student date of birth" />

    @csrf

    @isset($edit)
        @method('PATCH')
    @endisset
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
