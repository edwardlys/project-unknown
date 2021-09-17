<?php

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

Route::get('/', ['App\Http\Controllers\HomeController', 'index'])->name('home');

Route::get('/register', ['App\Http\Controllers\Auth\RegisterController', 'index'])->name('auth.register.index');
Route::post('/register', ['App\Http\Controllers\Auth\RegisterController', 'register'])->name('auth.register');

Route::get('/login', ['App\Http\Controllers\Auth\LoginController', 'index'])->name('auth.login.index');
Route::post('/login', ['App\Http\Controllers\Auth\LoginController', 'login'])->name('auth.login');
Route::get('/logout', ['App\Http\Controllers\Auth\LoginController', 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', ['App\Http\Controllers\ProfileController', 'index'])->name('profile');
    Route::get('/profile/update', ['App\Http\Controllers\ProfileController', 'updatePage'])->name('profile.update.page');
    Route::post('/profile/update', ['App\Http\Controllers\ProfileController', 'update'])->name('profile.update');

    // Admin routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/admin/users', ['App\Http\Controllers\Admin\UserController', 'index'])->name('admin.users');
        Route::post('/admin/users/{user}/make-admin', ['App\Http\Controllers\Admin\UserController', 'makeAdmin'])->name('admin.users.make_admin');
        Route::post('/admin/users/{user}/remove-admin', ['App\Http\Controllers\Admin\UserController', 'removeAdmin'])->name('admin.users.remove_admin');
    });
});