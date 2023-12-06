<?php

use App\Http\Controllers\DepartamentoControlador;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoControlador;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/produtos', [ProdutoControlador::class, 'index'])->name('produtos');
Route::get('/departamentos', [DepartamentoControlador::class, 'index'])->name('departamentos');
Route::get('/usuario', function() {
    return view('usuario');
})->name('usuario');
