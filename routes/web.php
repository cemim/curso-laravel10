<?php

use App\Http\Controllers\ControladorCategoria;
use App\Http\Controllers\ControladorProduto;
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
    return view('index');
})->name('home.index');

Route::get('/produtos', [ControladorProduto::class, 'index'])->name('produtos.index');
Route::get('/categorias', [ControladorCategoria::class, 'index'])->name('categorias.index');
Route::get('/categorias/novo', [ControladorCategoria::class, 'create'])->name('categorias.create');
Route::post('/categorias', [ControladorCategoria::class, 'store'])->name('categorias.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
