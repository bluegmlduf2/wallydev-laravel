<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

// 게시글 상세표시
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
});

require __DIR__ . '/auth.php';
