<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// APITokenテスト用
Route::middleware('auth:sanctum')->get('/Profile', [UserController::class, 'index']);

//comment投稿
Route::middleware('auth:sanctum')->post('comment', [CommentController::class, 'store']);

Route::middleware('auth:sanctum')->get('comment', [CommentController::class, 'index'])->name('api.comment');
    // ->only('store');
// $token = $request->user()->createToken();