<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
   public function index(){
    return [
        [
            "name" => "Kofi",
            "class" => 10,
            "id" => 10001
        ],
        [
            "name" => "Ama",
            "class" => 10,
            "id" => 10002
        ],
    ];
   }

   public function show(){
    return [
        "name" => "Ama",
        "class" => 10,
        "id" => 10002
    ];
   }

   public function create(){
    $storeUrl = route('students.store');

    return 
    '<form method="post" action="'.$storeUrl.'" >
        <input type="text" name="name" id="" placeholder="Enter name">
        <br>
        <input type="text" name="class" id="" placeholder="Enter class">
        <br>
        <input type="hidden" name="_token" value="'. csrf_token() .'" />
        <input type="submit" value="Submit">
    </form>';
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
