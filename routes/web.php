<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;


Route::get('/login',[AuthController::class, 'getLoginPage'])->name('auth.loginPage');

// Route::get('/students',[StudentController::class, 'index'])->name('students.index');
// Route::get('/students/create',[StudentController::class, 'create'])->name('students.create');
// Route::get('/students/{id}',[StudentController::class, 'show'])->name('students.show');
// Route::post('/students',[StudentController::class, 'store'])->name('students.store');
// Route::get('/students/{id}/edit',[StudentController::class, 'edit'])->name('students.edit');
// Route::patch('/students/{id}',[StudentController::class, 'update'])->name('students.update');
// Route::delete('/students/{id}',[StudentController::class, 'destroy'])->name('students.destroy');

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);





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
