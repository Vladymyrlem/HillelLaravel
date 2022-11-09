<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GeoIpController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Oauth\GitHubController;
use App\Http\Controllers\PostController as MyPostController;
use Illuminate\Support\Facades\Route;

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
Route::get('/oauth/github/callback', GitHubController::class)->name('oauth.github.callback');
/*Author routers group*/
Route::get('/author', [AuthorController::class, 'index'])->name('author');
Route::get('/author/{authorId}', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author/{authorId}/category/{categoryId}', [AuthorController::class, 'category'])->name('authorCategory');
Route::get('/author/{authorId}/category/{categoryId}/tag/{tag}', [AuthorController::class, 'categoryTag'])->name('authorCategoryTag');

Route::get('/post', [MyPostController::class, 'index'])->name('myPost');
Route::get('/post/{id}', [MyPostController::class, 'show'])->name('myPostShow')->whereNumber('id');

Route::get('/geo', [GeoIpController::class, 'index']);
Route::get('/geo-ip', [GeoIpController::class, 'ipinfo']);

/* block Auth */
Route::middleware(['guest'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('authLogin');
    Route::post('/auth/handleLogin', [AuthController::class, 'handleLogin'])->name('authHandleLogin');
});

/*Admin Routing group*/
Route::middleware(['auth'])->group(function () {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('authLogout');

    /*Admin Page Router*/
    Route::get('/admin', [MainController::class, 'index'])->name('admin.index');
    /*Category Router*/
    Route::prefix('admin')->group(function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('adminCategory');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('adminCategoryCreate');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('adminCategoryStore');
        Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('adminCategoryEdit');
        Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('adminCategoryUpdate');
        Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('adminCategoryDelete');
        Route::get('categories/trash', [CategoryController::class, 'trash'])->name('adminCategoryTrash');
        Route::get('/categories/restore/{id}', [CategoryController::class, 'restore'])->name('adminCategoryRestore');
        Route::get('/categories/forceDelete/{id}', [CategoryController::class, 'forceDelete'])->name('adminCategoryForceDelete');
        Route::get('/categories/{categoryId}', [CategoryController::class, 'show'])->name('adminCategoryShow');
    });

    /*Tag Router*/
    Route::get('/admin/tags', [TagController::class, 'index'])->name('adminTag');
    Route::get('/admin/tag/create', [TagController::class, 'create'])->name('adminTagCreate');
    Route::post('/admin/tag/store', [TagController::class, 'store'])->name('adminTagStore');
    Route::get('/admin/tag/edit/{id}', [TagController::class, 'edit'])->name('adminTagEdit');
    Route::put('/admin/tag/update/{tag}', [TagController::class, 'update'])->name('adminTagUpdate');
    Route::get('/admin/tag/delete/{id}', [TagController::class, 'delete'])->name('adminTagDelete');
    Route::get('/admin/tag/trash', [TagController::class, 'trash'])->name('adminTagTrash');
    Route::get('/admin/tag/restore/{id}', [TagController::class, 'restore'])->name('adminTagRestore');
    Route::get('/admin/tag/forceDelete/{id}', [TagController::class, 'forceDelete'])->name('adminTagForceDelete');
    Route::get('/admin/tags/{id}', [TagController::class, 'show'])->name('adminTagShow');

    /*Posts Router*/

    Route::get('/admin/post', [PostController::class, 'index'])->name('adminPost');
    Route::get('/admin/post/create', [PostController::class, 'create'])->name('adminPostCreate');
    Route::post('/admin/post/store', [PostController::class, 'store'])->name('adminPostStore');
    Route::get('/admin/post/edit/{id}', [PostController::class, 'edit'])->name('adminPostEdit');
    Route::put('/admin/post/update/{id}', [PostController::class, 'update'])->name('adminPostUpdate');
    Route::get('/admin/post/delete/{id}', [PostController::class, 'delete'])->name('adminPostDelete');
    Route::get('/admin/post/trash', [PostController::class, 'trash'])->name('adminPostTrash');
    Route::get('/admin/post/restore/{id}', [PostController::class, 'restore'])->name('adminPostRestore');
    Route::get('/admin/post/forceDelete/{id}', [PostController::class, 'forceDelete'])->name('adminPostForceDelete')
        ->can('delete', 'App/Models/Post');
    Route::get('/admin/post/{id}', [PostController::class, 'show'])->name('adminPostShow')->whereNumber('id');
});
