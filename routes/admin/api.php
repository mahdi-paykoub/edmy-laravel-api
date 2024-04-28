<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Session;
use Illuminate\Support\Facades\Route;


Route::resource('article', ArticleController::class);
Route::resource('category', CategoryController::class);
Route::resource('course', CourseController::class);
Route::resource('user', UserController::class);


Route::get('/session/{course}' ,  [SessionController::class, 'getSessionsOfOneCourse']);

Route::resource('session', SessionController::class);
