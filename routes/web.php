<?php

use App\Http\Controllers\BookController;
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

Route::get('', [BookController::class, 'index'])->name('get.book');

Route::group(['prefix', 'book'], function(){
    Route::post('', [BookController::class, 'store'])->name('store.book');
    Route::post('/{id}', [BookController::class, 'update'])->name('update.book');
    Route::get('/{id}', [BookController::class, 'destroy'])->name('delete.book');
});

