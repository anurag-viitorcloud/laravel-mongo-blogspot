<?php

use App\Http\Controllers\Frontend\Blog\BlogController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('blogs', BlogController::class);
    Route::post('create-blog', [BlogController::class, 'createBlog'])->name('blogs.create-blog');
    Route::post('update-blog', [BlogController::class, 'updateBlog'])->name('blogs.update-blog');
    Route::delete('delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('blogs.delete-blog');
});
