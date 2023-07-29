<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 네이베이션 페이지 라우팅 (+라우팅명)
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/javascript', [PostController::class, 'index'])->name('javascript');
Route::get('/php', [PostController::class, 'index'])->name('php');
Route::get('/vuejs', [PostController::class, 'index'])->name('vuejs');
Route::get('/others', [PostController::class, 'index'])->name('others');
Route::get('/life', [PostController::class, 'index'])->name('life');
Route::view('/about', 'about')->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/image', [ImageController::class, 'store'])->name('image.store');
});

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::patch('/posts/{post}/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/posts/{post}/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

require __DIR__ . '/auth.php';
