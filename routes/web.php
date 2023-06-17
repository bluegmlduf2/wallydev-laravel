<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

Route::get('/', HomeController::class)->name('home');
Route::get('/javascript', function () {
    return view('javascript');
})->name('javascript');
Route::get('/php', function () {
    return view('php');
})->name('php');
Route::get('/vuejs', function () {
    return view('vuejs');
})->name('vuejs');
Route::get('/others', function () {
    return view('others');
})->name('others');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/life', function () {
    return view('life');
})->name('life');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
