<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\SecurityLogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\LikeController;
use App\Http\Controllers\website\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
// use Illuminate\Support\Facades\Artisan;

// كود مسح الكاش
// Route::get('/clear', function() {
//  Artisan::call('route:clear');
// Artisan::call('config:clear');
//   return "تم مسح كاش المسارات والإعدادات بنجاح!";
// });

// Admin
Route::middleware(['auth', 'isLogin:admin'])->prefix('admin')->group(function () {
    Route::get('/owner/me', [UserController::class, 'index'])->name('admin');
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::get('/security-logs', [SecurityLogController::class, 'index'])->name('security.logs');
    Route::delete('/security-logs/clear', [SecurityLogController::class, 'clear'])->name('admin.security.clear');
});

// Handle file_Storage
// // الـ Storage proxy المطور والقاطع لأي لبس في مسارات السيرفر
// Route::get('/storage/{path}', function ($path) {
//     // استخدام المسار الحقيقي المباشر للمجلد العام على السيرفر
//     $fullPath = base_path("htdocs/storage/{$path}");

//     // إذا لم يجد المسار الأول، جرب المسار البديل العادي احتياطاً
//     if (!File::exists($fullPath)) {
//         $fullPath = public_path("storage/{$path}");
//     }

//     if (!File::exists($fullPath)) {
//         abort(404, 'الملف غير موجود في المسار: ' . $fullPath);
//     }

//     $file = File::get($fullPath);
//     $type = File::mimeType($fullPath);

//     return Response::make($file, 200)->header("Content-Type", $type);
// })->where('path', '.*');

// Auth (لا تحتاج login)
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'handleLogin');
    Route::get('/register', 'registar')->name('register');
    Route::post('/register', 'handleRegistar');
    Route::post('/logout', 'logout')->name('logout');
});

// كل الـ routes المحتاجة login
Route::middleware('isLogin')->group(function () {
    // Website
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/posts/{id}/like', [LikeController::class, 'toggle'])->name('posts.like');
    
    // Posts
    Route::post('posts/store',[PostController::class, 'store'])->name('storePost');

    // Comments
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
});
