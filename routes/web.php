<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students',[StudentController::class, 'index'])->name('students.index');
Route::get('/students/create',[StudentController::class, 'create'])->name('students.create');
Route::get('/students/{id}',[StudentController::class, 'show'])->name('students.show');
Route::post('/students',[StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit',[StudentController::class, 'edit'])->name('students.edit');
Route::patch('/students',[StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}',[StudentController::class, 'destroy'])->name('students.destroy');
































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
