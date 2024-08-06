<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $courses = Course::all();
       return view('courses.index',[
        'courses' => $courses
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create',[ "course" => new Course ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
        $data = $request->validate([
            'name' => 'required|unique:courses|max:150|min:4'
        ]); // data type is array

        // method 1 - using save()
        // $newCourse = new Course;
        // $newCourse->name = $data['name'];
        // $newCourse->save();
        // return $newCourse;

        Course::create($data);
        return redirect()->route('courses.index');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        // $course = Course::findOrFail($id); // if (string $id) is passed as an argument

        return view('courses.edit',[ "course" => $course ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => 'required|unique:courses|max:150|min:4'
        ]); // data type is array

        $course->update($data);
        return redirect()->route('courses.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
        ->with('alertMessage',"Course {$course->name} deleted successfully")->with('type', 'success');
    }
}
