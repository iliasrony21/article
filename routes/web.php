<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','role:admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/inactive/user', [AdminController::class, 'inactiveUser'])->name('inactive.user');
    Route::get('/active/user', [AdminController::class, 'activeUser'])->name('active.user');
    Route::get('/inactive/approve/{id}', [AdminController::class, 'inactiveapprove'])->name('inactive.approved');
    Route::get('/active/approve/{id}', [AdminController::class, 'activeapprove'])->name('active.approved');

});
Route::middleware('auth','role:user')->group(function () {
    Route::get('user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('article/add', [UserController::class, 'articleAdd'])->name('article.add');
    Route::post('article/store', [UserController::class, 'store'])->name('article.store');
    Route::get('article/manage', [UserController::class, 'manage'])->name('article.manage');
    Route::get('/article/edit/{id}', [UserController::class, 'editArticle'])->name('article.edit');
    Route::post('/article/update/{id}', [UserController::class, 'updateArticle'])->name('article.update');
    Route::get('/article/update/{id}', [UserController::class, 'deleteArticle'])->name('article.delete');


});
Route::get('/', [UserController::class, 'showArticle'])->name('show.article');




require __DIR__.'/auth.php';
