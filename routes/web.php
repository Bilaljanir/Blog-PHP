<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/{category}/posts', [HomeController::class, 'postsByCategory'])->name('category.posts');
Route::resource('posts', PostController::class);
Route::get('change/lang/{lang}', [HomeController::class, 'changeLang'])
    ->name('change.lang');
