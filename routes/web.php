<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use Illuminate\Routing\RouteGroup;

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

Route::get('/', [MainUserController::class, 'index']);
Route::get('/artikel', [BlogController::class, 'index']);
Route::get('/artikel/detail/{slug}', [BlogController::class, 'detail']);

Route::get('/kontak', [ContactController::class, 'index']);
Route::get('/cari', [SearchController::class, 'search'])->name('search');
Route::get('/cari-kategori/{tag}', [SearchController::class, 'searchTag'])->name('search.tag');
Route::get('/tentang-saya', [AboutUsController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login/proses', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/proses', [RegisterController::class, 'store'])->name('register');

Route::group(['middleware' => ['auth', 'ceklevel:user,super_admin']], function () {
    Route::post('/kontak/store', [ContactController::class, 'store'])->name('kontak.store');
    // Rute untuk menambah komentar berdasarkan slug artikel
    Route::post('/artikel/detail/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');
    // Rute untuk menambah likes berdasarkan slug artikel
    Route::post('/artikel/detail/{slug}/likes', [LikeController::class, 'store'])->name('likes.store');
});


Route::group(['middleware' => ['auth', 'ceklevel:super_admin']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::post('/upload', [UploadController::class, 'upload'])->name('upload');

    Route::get('/admin/form', [FormController::class, 'index']);
    Route::get('/admin/search', [FormController::class, 'search'])->name('form.search');
    Route::get('/admin/form/create', [FormController::class, 'create']);
    Route::post('/admin/form/create/store', [FormController::class, 'store'])->name('form.store');
    Route::get('/admin/form/edit/{id}', [FormController::class, 'edit'])->name('form.edit');
    Route::put('/admin/form/edit/update/{id}', [FormController::class, 'update'])->name('form.update');
    Route::delete('/admin/form/delete/{id}', [FormController::class, 'delete'])->name('form.delete');
    Route::get('/admin/form/detail/{id}', [FormController::class, 'detail'])->name('form.detail');
    Route::delete('/admin/form/detail/{id}/comment-delete', [CommentController::class, 'destroy'])->name('comment.delete');

    Route::get('/admin/tag', [TagController::class, 'index']);
    Route::get('/admin/tag/create', [TagController::class, 'create']);
    Route::post('/admin/tag/create/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/admin/tag/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/admin/tag/update/{id}', [TagController::class, 'store'])->name('tag.update');
    Route::delete('/admin/tag/delete/{id}', [TagController::class, 'delete'])->name('tag.delete');

    Route::get('/admin/tentang-saya', [AboutUsController::class, 'admin']);

    Route::get('/admin/message', [ContactController::class, 'message']);
});



