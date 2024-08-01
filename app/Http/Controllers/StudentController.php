<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

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

    return view('students.create', [ 'courses' => $courses ]);
   }

   public function store(Request $request){
    // first argument => validation rules
    // second argument => custom messages
    // third argument => custom attribute names
        $data = $request->validate([
            'firstname' => 'required|alpha|min:3|max:50',
            'lastname' => 'required|alpha|max:100|min:3',
            'dob' => 'required|before:2000-01-01',
            'email' => 'required|unique:students|email|max:150',
            'course_id' => 'required|exists:courses,id',
            'gender' => 'required|in:male,female',
            'phonenumber' => 'required|numeric',
            'student_id' => 'required|alpha_num'
        ],[
            // regex:/GIKACE-d{3}-d{4}/
            // 'required' => 'Please enter a value for :attribute',
            // 'gender.required' => 'Please select a gender',
            // 'course_id.required' => 'Please select a course',

        ],
        [
            'dob' => 'date of birth',
            'course_id' => 'course'
        ]
    );
        Student::create($data);
        return redirect()->route('students.index');
   }

   public function edit(){
    return "This is the edit function";
   }

   public function update(){
    return "This is the update function";
   }

   public function destroy(){
    return "This is the destroy function";
   }

}
