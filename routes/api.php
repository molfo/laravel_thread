<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ApiCommentController;

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

Route::group(['middleware' => ['json.response']], function () {

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // APITokenテスト用
    // Route::middleware('auth:sanctum')->get('/profile', [UserController::class, 'index'])->name('profile');

    //comment一覧
    // Route::middleware('auth:sanctum')->get('/allcomment', [CommentController::class, 'index']);

    //comment投稿
    Route::middleware('auth:sanctum')->post('/apicomment', ApiCommentController::class)->name('api.comment.store');

    // //comment削除
    // Route::middleware('auth:sanctum')->delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
});
