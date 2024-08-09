<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\SuperAdminGuard;

use Illuminate\Http\Request;


// use Illuminate\Support\Facades\Mail;
// use App\Mail\WelcomeMessage;

// Route::get('/mail',function(){
//     Mail::to('test@test.com')->send(new WelcomeMessage());
// });


Route::redirect('/','/login');
Route::get('/login',[AuthController::class, 'getLoginPage'])->name('auth.loginPage')->middleware('guest');

Route::get('/forgot-password',[AuthController::class, 'getForgotPasswordPage'])->name('auth.getForgotPasswordPage')->middleware('guest');
Route::post('/forgot-password',[AuthController::class, 'requestForgotPasswordLink'])->name('auth.requestForgotPasswordLink')->middleware('guest');

Route::get('/reset-password/{token}',[AuthController::class, 'getPasswordResetPage'])->name('password.reset')->middleware('guest');
Route::post('/reset-password',[AuthController::class, 'resetPassword'])->name('auth.resetPassword')->middleware('guest');


Route::post('/login',[AuthController::class, 'authenticate'])->name('auth.login')->middleware('guest');
Route::post('/logout',[AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

Route::resource('students', StudentController::class)->middleware('auth');
Route::resource('courses', CourseController::class)->middleware('auth');
Route::resource('subjects', SubjectController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware(['auth', SuperAdminGuard::class]);


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
