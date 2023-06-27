<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/{category}/posts', [HomeController::class, 'postsByCategory'])->name('category.posts');
Route::resource('posts', PostController::class);
Route::get('change/lang/{lang}', [HomeController::class, 'changeLang'])->name('change.lang');
Route::get('{tag}/posts', [HomeController::class, 'postsByTag'])->name('tag.posts');

Route::resource('posts', PostController::class);

Route::prefix('admin')->group(function() {
    Route::middleware('admin')->group(function(){
        Route::get('dashboard',[AdminController::class, 'index'])->name('admin.index');
        Route::post('logout',[AdminController::class, 'logout'])->name('admin.logout');
    });
    Route::post('login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
});
Route::get('/create')->name('admin.create');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/favors', [PostController::class, 'indexFavorites'])->name('favors.index');

Route::post('/favors/{post}', [PostController::class, 'addToFavorites'])->name('favors.add');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favors.index');


