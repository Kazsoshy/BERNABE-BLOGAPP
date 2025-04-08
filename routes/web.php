<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', function () {
    return redirect('/posts');
});

Route::resource('posts', PostController::class);