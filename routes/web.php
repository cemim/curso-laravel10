<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminControlador::class, 'index'])->name('admin.dashboard');
Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginControlador::class, 'index'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginControlador::class, 'login'])->name('admin.login.submit');
