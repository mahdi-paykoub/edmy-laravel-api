<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('article', ArticleController::class);
Route::resource('category', CategoryController::class);
Route::resource('course', CourseController::class);
Route::resource('user', UserController::class);
// Route::resource('co', UserController::class);
Route::resource('contact-us', ContactUsController::class)->only('index', 'destroy')->parameters(['contact-us' => 'contactUs']);;


Route::get('/session/{course}',  [SessionController::class, 'getSessionsOfOneCourse']);
Route::resource('session', SessionController::class);
