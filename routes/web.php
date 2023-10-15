<?php

use App\Http\Controllers\ClienteControlador;
use App\Http\Controllers\MeuControlador;
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

Route::get('produtos',  [MeuControlador::class,'produtos'])->name('produtos');
Route::get('departamentos',  function(){
    return view('outras.departamentos');
})->name('departamentos');
Route::get('nome',  [MeuControlador::class,'getNome']);
Route::get('idade',  [MeuControlador::class,'getIdade']);
Route::get('multiplicar/{n1}/{n2}',  [MeuControlador::class,'multiplicar']);

Route::resource('clientes', ClienteControlador::class);

Route::get('opcoes/{opcao?}', function($opcao=null){
    return view('outras.opcoes', compact(['opcao']));
})->name('opcoes');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
