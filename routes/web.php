<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;

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

/*Home Page. List Posts*/
Route::get('/', [HomeController::class, 'index']);

/*Author routers group*/
Route::get('/author', [AuthorController::class, 'index'])->name('author');
Route::get('/author/{authorId}', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author/{authorId}/category/{categoryId}', [AuthorController::class, 'category'])->name('authorCategory');
Route::get('/author/{authorId}/category/{categoryId}/tag/{tag}', [AuthorController::class, 'categoryTag'])->name('authorCategoryTag');

/*Category Router*/
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{categoryId}', [CategoryController::class, 'show'])->name('category.show');

/*Tag Router*/
Route::get('/tags', [TagController::class, 'list']);
Route::get('/tag/{tagId}', [TagController::class, 'index'])->name('tag');

