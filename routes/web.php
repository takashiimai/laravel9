<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
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

// 管理画面用
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/add', [PostController::class, 'add'])->name('post.add');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/update', [PostController::class, 'update'])->name('post.update');
});

