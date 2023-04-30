<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
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
Route::get('login', [AuthController::class,'index'])->name('login');
Route::post('login', [AuthController::class,'login'])->name('post.login');
Route::post('register', [AuthController::class,'register'])->name('post.register');
Route::get('logout', [AuthController::class,'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('get.home');

    Route::group(['prefix' => 'book'], function(){
        Route::get('author/{slug}', [BookController::class, 'authorBook'])->name('get.author-book');
        Route::post('/', [BookController::class, 'store'])->name('store.book');
        Route::post('/{id}', [BookController::class, 'update'])->name('update.book');
        Route::get('delete/{id}', [BookController::class, 'destroy'])->name('delete.book');
        Route::get('/{list_type?}/{author?}', [BookController::class, 'index'])->name('get.book');
    });

    Route::group(['prefix' => 'type'], function(){
        Route::post('/', [TypeController::class, 'store'])->name('store.type');
        Route::post('/{id}', [TypeController::class, 'update'])->name('update.type');
        Route::post('/delete/{id}', [TypeController::class, 'destroy'])->name('delete.type');
    });
});





