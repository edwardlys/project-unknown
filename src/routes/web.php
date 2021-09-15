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

Route::get('/profile', ['App\Http\Controllers\ProfileController', 'index'])->name('profile')->middleware('auth');
Route::get('/profile/update', ['App\Http\Controllers\ProfileController', 'updatePage'])->name('profile.update.page')->middleware('auth');
Route::post('/profile/update', ['App\Http\Controllers\ProfileController', 'update'])->name('profile.update')->middleware('auth');