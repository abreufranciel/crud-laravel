<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('posts.delete');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/', function () {
    return view('welcome');
});
