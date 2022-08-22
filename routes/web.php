<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;

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

Route::get('posts2',[DBController::class , 'index'])->name('index.post');


Route::get('posts2/create',[DBController::class , 'create'])->name('create.post');
Route::post('posts2/store',[DBController::class , 'store'])->name('store.post');



Route::delete('posts2/{id}', [DBController::class, 'destroy'])->name('destroy.post');


Route::get('posts2/{id}/edit',[DBController::class , 'edit'])->name('edit.post');
Route::put('posts2/{id}/update',[DBController::class , 'update'])->name('post.update');



// Route::delete('posts2/{id}',[DBController::class , 'destroy'])->name('destroy.post');
