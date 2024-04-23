<?php

use App\Http\Controllers\Admin\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('article', ArticleController::class);
