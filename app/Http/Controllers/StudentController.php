<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    //
   public function index(){
    // fetch all students and save into a variable
    $students = Student::all();

    return view('students.index',[
        "students" => $students // pass the variable to the view 
    ]);
   }

   public function show(){
    return [
        "name" => "Ama",
        "class" => 10,
        "id" => 10002
    ];
   }

   public function create(){
    $courses = Course::all(['id','name'])->map(function ($course) {
        return [ 
            'value' => $course->id,
            'label' => $course->name
        ];
    });

    return view('students.create', [ 'courses' => $courses, 'student' => new Student ]);
   }

   public function store(Request $request){
    // first argument => validation rules
    // second argument => custom messages
    // third argument => custom attribute names
        $validator = $this->getValidationRules();
        $data = $request->validate($validator['rules'],$validator['messages'],$validator['attributes']);
        Student::create($data);
       
        return redirect()->route('students.index')->with('alertMessage',"Student {$data['firstname']} added successfully")->with('type', 'danger');
   }

   public function edit(Student $student){
    $courses = Course::all(['id','name'])->map(function ($course) {
        return [ 
            'value' => $course->id,
            'label' => $course->name
        ];
    });
    return view('students.edit', ['student' => $student, 'courses' => $courses]);
   }

   public function update(Request $request, Student $student){
        $validator = $this->getValidationRules($student->id);
        $data = $request->validate($validator['rules'],$validator['messages'],$validator['attributes']);
        $student->update($data);
   }

   public function destroy(){
    return "This is the destroy function";
   }

   private function getValidationRules($studentId = null) {
        $rules = [
            'firstname' => 'required|alpha|min:3|max:50',
            'lastname' => 'required|alpha|max:100|min:3',
            'dob' => 'required|before:2000-01-01',
            'course_id' => 'required|exists:courses,id',
            'gender' => 'required|in:male,female,other',
            'phonenumber' => 'required|numeric',
            'student_id' => 'required|alpha_num',
            'email' => ['required','email','max:150'],
        ];

        if ($studentId != null){
            $rules['email'][] =  Rule::unique('students')->ignore($studentId);
        } else {
            $rules['email'][] = 'unique|students';
        }

        $messages = [
            // regex:/GIKACE-d{3}-d{4}/
            // 'required' => 'Please enter a value for :attribute',
            // 'gender.required' => 'Please select a gender',
            // 'course_id.required' => 'Please select a course',
        ];
        $attributes = [
             'dob' => 'date of birth',
            'course_id' => 'course'
        ];
        return ['rules' => $rules, 'messages' => $messages,'attributes' => $attributes];
   }

}
