<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

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
    $storeUrl = route('students.show',["student" => 1]);

    return 
    '<form method="get" action="'.$storeUrl.'" >
        <input type="text" name="name" id="" placeholder="Enter name">
        <br>
        <input type="text" name="class" id="" placeholder="Enter class">
        <br>
        <input type="hidden" name="_token" value="'. csrf_token() .'" />
        <input type="submit" value="Submit">
        </form>';
        // <input type="hidden" name="_method" value="DELETE" />
   }

   public function store(){
    return "This is the store function";
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
