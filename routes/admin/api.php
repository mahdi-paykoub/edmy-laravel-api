<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::resource('article', ArticleController::class);

Route::resource('category', CategoryController::class);
