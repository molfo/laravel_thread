<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/comment', [CommentController::class, 'index'])->middleware(['auth'])->name('index.comment');

Route::post('/comment', [CommentController::class, 'store'])->middleware(['auth'])->name('comment.store');

Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->middleware(['auth'])->name('comment.destroy');

Route::get('/profile', [UserController::class, 'index'])->middleware(['auth'])->name('profile');

// test用
// Route::post('/test', [CommentController::class, 'store'])->middleware(['auth'])->name('testdd');

require __DIR__ . '/auth.php';
