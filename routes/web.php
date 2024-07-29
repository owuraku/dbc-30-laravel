<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectController;
use Illuminate\Http\Request;


Route::get('/login',[AuthController::class, 'getLoginPage'])->name('auth.loginPage');

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('subjects', SubjectController::class);






Route::get('/homepage', function(Request $request) {
    
    $name = $request->query('name');
    $age = request()->query('age');
    $number = request()->query('number');


    return view('homepage', [ 
        'name' => $name,
        'age' => $age,
        'number' => $number,
     ]);

})->name('homepage');

































// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function(){
//     return "Hi";
// })->name('hello')->middleware([Bouncer::class]);

// Route::get('/hello', [StudentController::class, 'sayHello']);

// Route::get('/hi', [StudentController::class, 'sayWelcome']);


// Route::get('/students/{name}/{id}', function($id, $name){
//     //  return route('hello');
//     return "<h1>Id : {$id}  Student Name: {$name}  </h1>";
// });
