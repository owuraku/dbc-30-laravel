<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/auth/token',[AuthController::class, 'getToken']);
Route::post('/auth/token/revoke',[AuthController::class, 'revokeToken'])->middleware('auth:sanctum');

Route::resource('students', StudentController::class)->middleware('auth:sanctum');