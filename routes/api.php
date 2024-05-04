<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;



// auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'getMe']);
//contact us
Route::post('/contact-us',[ContactUsController::class, 'store'])->name('contact.us');
// course
Route::get('/course/all',[CourseController::class, 'all'])->name('all.courses');
Route::get('/course/{courseSlug}',[CourseController::class, 'single'])->name('single.course');
Route::get('/course/category/{categorySlug}',[CourseController::class, 'categoryCourses'])->name('category.course');
//sessions
Route::get('/course/{courseSlug}/sessions',[SessionController::class, 'getSessionsOfOneCourse'])->name('all.sessions');
Route::get('/course/session/{session}',[SessionController::class, 'getOneSessionOfCourse'])->name('course.session');
//article
Route::get('/article/all',[ArticleController::class, 'all'])->name('all.articles');
Route::get('/article/{articleSlug}',[ArticleController::class, 'single'])->name('single.article');
Route::get('/article/category/{categorySlug}',[ArticleController::class, 'categoryArticles'])->name('category.article');
//search
Route::get('/search/article/{value}',[SearchController::class, 'articleName'])->name('search.article.name');
Route::get('/search/course/{value}',[SearchController::class, 'courseName'])->name('search.course.name');
//comment
Route::post('/comment/add',[CommentController::class, 'add'])->name('comment.add');
Route::get('/comment/article/all/{article}',[CommentController::class, 'commentsOfArticle'])->name('get.comment.article');
Route::get('/comment/course/all/{course}',[CommentController::class, 'commentsOfCourse'])->name('get.comment.course');
