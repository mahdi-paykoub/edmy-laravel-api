<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'getMe']);

//contact us
Route::post('/contact-us',[ContactUsController::class, 'store'])->name('contact.us');


// course
Route::get('/course/all',[CourseController::class, 'allCourses'])->name('all.courses');
