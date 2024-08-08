<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      if(Auth::user()->isSuperAdmin()){
        $courses = Course::withTrashed()->simplePaginate(10);

      } else {
          $courses = Course::simplePaginate(10);
      }
       
       return view('courses.index',[
        'courses' => $courses,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('courses.create',[ 
            "course" => new Course, 
            'subjects' => $subjects 
    ]);
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
            'name' => 'required|unique:courses|max:150|min:4',
            'subject_id' => 'required|array',
            'subject_id.*' => 'exists:subjects,id'
        ]); // data type is array

        // method 1 - using save()
        // $newCourse = new Course;
        // $newCourse->name = $data['name'];
        // $newCourse->save();
        // return $newCourse;

        $course = Course::create($data);
        // $course->subjects->attach()
        // $course->subjects->detach()
        $course->subjects()->sync($data['subject_id']);

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
        $subjects = Subject::all();
        return view('courses.edit',[ "course" => $course, 'subjects' => $subjects  ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => "required|unique:courses,id,{$course->id}|max:150|min:4",
             'subject_id' => 'required|array',
            'subject_id.*' => 'exists:subjects,id'
        ]); // data type is array

        $course->update($data);
        $course->subjects()->sync($data['subject_id']);

        return redirect()->route('courses.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::withTrashed()->find($id);

        if ($course->trashed()){
            // remove all subjects 
            $course->subjects()->sync([]);
            $course->forceDelete();
        }else{
            $course->delete();
        }

        return redirect()->route('courses.index')
        ->with('alertMessage',"Course {$course->name} deleted successfully")->with('type', 'success');
    }
}
