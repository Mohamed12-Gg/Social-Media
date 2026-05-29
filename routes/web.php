<?php

use App\Http\Controllers\Admin\SecurityLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\LikeController;
use App\Http\Controllers\website\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'isLogin'])->prefix('admin')->group(function () {
    // ... مسارات الأدمن الأخرى ...

    Route::get('/security-logs', [SecurityLogController::class, 'index'])->name('security.logs');
    Route::delete('/security-logs/clear', [SecurityLogController::class, 'clear'])->name('admin.security.clear');
});




// routes محتاجة login
Route::middleware('isLogin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('isLogin');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::post('/posts/{id}/like', [LikeController::class, 'toggle'])->name('posts.like')->middleware('isLogin');
});


Route::get('/admin', [UserController::class, 'index'])->name('admin')->middleware('isLogin');


Route::resource('users',UserController::class)->middleware('isLogin');
Route::resource('posts',PostController::class)->middleware('isLogin');
Route::resource('comments',CommentController::class)->middleware('isLogin');


// Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'handleLogin');
    Route::get('/register', 'registar')->name('register');
    Route::post('/register', 'handleRegistar');
    Route::post('/logout', 'logout')->name('logout');
});

