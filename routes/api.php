<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('add/comment',[CommentController::class, 'store']);
Route::get('comments/{post_id}', [CommentController::class, 'getPostComments']);
Route::delete('comments/{id}', [CommentController::class, 'destroy']);

Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
