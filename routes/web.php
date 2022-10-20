<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminMainController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

/*Author routers group*/
Route::get('/author', [AuthorController::class, 'index'])->name('author');
Route::get('/author/{authorId}', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author/{authorId}/category/{categoryId}', [AuthorController::class, 'category'])->name('authorCategory');
Route::get('/author/{authorId}/category/{categoryId}/tag/{tag}', [AuthorController::class, 'categoryTag'])->name('authorCategoryTag');


/* block Auth */
//Route::middleware(['guest'])->group(function () {
//
//});
//Route::get('/auth/login', [AuthController::class, 'login'])->name('authLogin');
//Route::post('/auth/handleLogin', [AuthController::class, 'handleLogin'])->name('authHandleLogin');
Route::get('/auth/login', [AuthController::class, 'login'])->name('authLogin')
    ->middleware('guest');
Route::post('/auth/login', [AuthController::class, 'handleLogin'])->name('authHandleLogin');

/*Admin Routing group*/
Route::middleware(['auth'])->group(function () {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('authLogout');

    /*Admin Page Router*/
    Route::get('/admin', [AdminMainController::class, 'index'])->name('admin.index');
    /*Category Router*/
    Route::prefix('admin')->group(function () {
        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('adminCategory');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('adminCategoryCreate');
        Route::post('/categories/store', [AdminCategoryController::class, 'store'])->name('adminCategoryStore');
        Route::get('/categories/edit/{id}', [AdminCategoryController::class, 'edit'])->name('adminCategoryEdit');
        Route::put('/categories/update/{id}', [AdminCategoryController::class, 'update'])->name('adminCategoryUpdate');
        Route::get('/categories/delete/{id}', [AdminCategoryController::class, 'delete'])->name('adminCategoryDelete');
        Route::get('categories/trash', [AdminCategoryController::class, 'trash'])->name('adminCategoryTrash');
        Route::get('/categories/restore/{id}', [AdminCategoryController::class, 'restore'])->name('adminCategoryRestore');
        Route::get('/categories/forceDelete/{id}', [AdminCategoryController::class, 'forceDelete'])->name('adminCategoryForceDelete');
        Route::get('/categories/{categoryId}', [AdminCategoryController::class, 'show'])->name('adminCategoryShow');
    });


    /*Tag Router*/
    Route::get('/admin/tags', [AdminTagController::class, 'index'])->name('adminTag');
    Route::get('/admin/tag/create', [AdminTagController::class, 'create'])->name('adminTagCreate');
    Route::post('/admin/tag/store', [AdminTagController::class, 'store'])->name('adminTagStore');
    Route::get('/admin/tag/edit/{id}', [AdminTagController::class, 'edit'])->name('adminTagEdit');
    Route::put('/admin/tag/update/{tag}', [AdminTagController::class, 'update'])->name('adminTagUpdate');
    Route::get('/admin/tag/delete/{id}', [AdminTagController::class, 'delete'])->name('adminTagDelete');
    Route::get('/admin/tag/trash', [AdminTagController::class, 'trash'])->name('adminTagTrash');
    Route::get('/admin/tag/restore/{id}', [AdminTagController::class, 'restore'])->name('adminTagRestore');
    Route::get('/admin/tag/forceDelete/{id}', [AdminTagController::class, 'forceDelete'])->name('adminTagForceDelete');
    Route::get('/admin/tags/{id}', [AdminTagController::class, 'show'])->name('adminTagShow');

    /*Posts Router*/
    Route::get('/admin/post', [AdminPostController::class, 'index'])->name('adminPost');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('adminPostCreate');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('adminPostStore');
    Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('adminPostEdit');
    Route::put('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('adminPostUpdate');
    Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('adminPostDelete');
    Route::get('/admin/post/trash', [AdminPostController::class, 'trash'])->name('adminPostTrash');
    Route::get('/admin/post/restore/{id}', [AdminPostController::class, 'restore'])->name('adminPostRestore');
    Route::get('/admin/post/forceDelete/{id}', [AdminPostController::class, 'forceDelete'])->name('adminPostForceDelete');
    Route::get('/admin/post/{id}', [AdminPostController::class, 'show'])->name('adminPostShow')->whereNumber('id');
});
