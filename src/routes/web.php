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

Route::get('/', ['App\Http\Controllers\PageController', 'home'])->name('page.home');

Route::get('/register', ['App\Http\Controllers\PageController', 'register'])->name('page.register');
Route::post('/register', ['App\Http\Controllers\AuthController', 'register'])->name('register');

Route::get('/login', ['App\Http\Controllers\PageController', 'login'])->name('page.login');
Route::post('/login', ['App\Http\Controllers\AuthController', 'login'])->name('register');