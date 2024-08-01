<form class="container-sm" action="{{$action}}" method="POST">
    <div class="row g-3">
        <div class="col">
            <x-textfield name="firstname" label="Firstname" type="text" placeholder="Enter student firstname" />
        </div>
        <div class="col">
            <x-textfield name="lastname" label="Lastname" type="text" placeholder="Enter student lastname" />
        </div>
    </div>   
    <div class="row g-3">
        <div class="col">
            <x-textfield name="student_id" label="Student ID" type="text" placeholder="Enter student ID" />
        </div>
        <div class="col">
            <x-textfield name="email" label="Student Email" type="email" placeholder="Enter student email" />
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


    <x-select-field :options="$gender" name="gender" label="Select Gender" />

    <x-select-field :options="$courses" name="course_id" label="Select Course"/>

    <x-textfield name="phonenumber" label="Student Phonenumber" type="tel" placeholder="Enter student phonenumber" />
    
    <x-textfield name="dob" label="Student DOB" type="date" placeholder="Enter student date of birth" />

    @csrf
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
