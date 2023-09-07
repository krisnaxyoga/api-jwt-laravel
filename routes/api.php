<?php

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
/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware(['auth:api'])->group(function () {
    // Semua route dalam grup ini akan menggunakan middleware auth:api
    Route::get('/user', function (Request $request) {
            return $request->user();
        });

    Route::get('/userdata', App\Http\Controllers\Api\UserController::class)->name('userdata');
    // Gantilah 'UserController::class' dengan controller dan metode yang sesuai untuk route '/userdata'

    // Anda dapat menambahkan route lain yang memerlukan autentikasi di sini

    Route::get('/post', [App\Http\Controllers\Api\Post\PostController::class,'index'])->name('post.index');
    Route::post('/post/store', [App\Http\Controllers\Api\Post\PostController::class,'store'])->name('post.store');
    Route::get('/post/show/{id}', [App\Http\Controllers\Api\Post\PostController::class,'show'])->name('post.show');
    Route::post('/post/update/{id}', [App\Http\Controllers\Api\Post\PostController::class,'update'])->name('post.update');
    Route::get('/post/destroy/{id}', [App\Http\Controllers\Api\Post\PostController::class,'destroy'])->name('post.destroy');
});



/**
 * route "/logout"
 * @method "POST"
 */
Route::post('/logout', App\Http\Controllers\Api\LogOutController::class)->name('logout');
