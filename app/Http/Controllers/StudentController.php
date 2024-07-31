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
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'dob' => 'required',
            'course_id' => 'required',

        ]);
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
