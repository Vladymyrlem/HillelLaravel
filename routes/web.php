<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminPostController;
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
Route::get('admin/categories', [AdminCategoryController::class, 'index'])->name('adminCategory');
Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('adminCategoryCreate');
Route::post('/admin/categories/store', [AdminCategoryController::class, 'store'])->name('adminCategoryStore');
Route::get('/admin/categories/edit/{id}', [AdminCategoryController::class, 'edit'])->name('adminCategoryEdit');
Route::post('/admin/categories/update', [AdminCategoryController::class, 'update'])->name('adminCategoryUpdate');
Route::get('/admin/categories/delete/{id}', [AdminCategoryController::class, 'delete'])->name('adminCategoryDelete');
Route::get('/admin/categories/trash', [AdminCategoryController::class, 'trash'])->name('adminCategoryTrash');
Route::get('/admin/categories/restore/{id}', [AdminCategoryController::class, 'restore'])->name('adminCategoryRestore');
Route::get('/admin/categories/forceDelete/{id}', [AdminCategoryController::class, 'forceDelete'])->name('adminCategoryForceDelete');
Route::get('/categories/{categoryId}', [CategoryController::class, 'show'])->name('category.show');

/*Tag Router*/
Route::get('/admin/tags', [AdminTagController::class, 'index'])->name('adminTag');
Route::get('/admin/tag/create', [AdminTagController::class, 'create'])->name('adminTagCreate');
Route::post('/admin/tag/store', [AdminTagController::class, 'store'])->name('adminTagStore');
Route::get('/admin/tag/edit/{id}', [AdminTagController::class, 'edit'])->name('adminTagEdit');
Route::post('/admin/tag/update', [AdminTagController::class, 'update'])->name('adminTagUpdate');
Route::get('/admin/tag/delete/{id}', [AdminTagController::class, 'delete'])->name('adminTagDelete');
Route::get('/admin/tag/trash', [AdminTagController::class, 'trash'])->name('adminTagTrash');
Route::get('/admin/tag/restore/{id}', [AdminTagController::class, 'restore'])->name('adminTagRestore');
Route::get('/admin/tag/forceDelete/{id}', [AdminTagController::class, 'forceDelete'])->name('adminTagForceDelete');

/*Posts Router*/
Route::get('/admin/post', [AdminPostController::class, 'index'])->name('adminPost');
Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('adminPostCreate');
Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('adminPostStore');
Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('adminPostEdit');
Route::post('/admin/post/update', [AdminPostController::class, 'update'])->name('adminPostUpdate');
Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('adminPostDelete');
Route::get('/admin/post/trash', [AdminPostController::class, 'trash'])->name('adminPostTrash');
Route::get('/admin/post/restore/{id}', [AdminPostController::class, 'restore'])->name('adminPostRestore');
Route::get('/admin/post/forceDelete/{id}', [AdminPostController::class, 'forceDelete'])->name('adminPostForceDelete');
