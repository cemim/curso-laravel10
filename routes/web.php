<?php

use App\Http\Controllers\ProdutoControlador;
use App\Http\Controllers\UsuarioControlador;
use Illuminate\Http\Request;
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

// Route::get('/usuarios', [UsuarioControlador::class, 'index'])->middleware('primeiro');

// Chama o middleware pela configuração no arquivo de Kernel
Route::get('/usuarios', [UsuarioControlador::class, 'index'])->middleware('primeiro', 'segundo'); // Chama o middleware apelidado no arquivo kernel.php
Route::get('/', function () {
    return 'teste';
});

// Passar parâmetro middleware
Route::get('/terceiro', function () {
    return 'Passou pelo terceiro middleware';
})->middleware('terceiro:joao,20');

Route::get('/produtos', [ProdutoControlador::class, 'index']);

Route::get('/negado', function() {
    return 'Acesso Negado';
})->name('negado');

Route::get('/negadologin', function() {
    return 'Acesso Negado Precisa ser admin para acessar';
})->name('negadologin');

Route::get('/logout', function(Request $req) {
    $req->session()->flush();
    return response('deslogado', 200);
})->name('logout');

Route::post('/login', function (Request $req) {
    $login_ok = false;
    $admin = false;

    switch ($req->input('user')) {
        case 'joao':
            $login_ok = $req->input('passwd') === 'senhajoao';
            $admin = true;
            break;
        case 'marcos':
            $login_ok = $req->input('passwd') === 'senhamarcos';
            break;
        case 'default':
            $login_ok = false;
    }

    if($login_ok) {
        $login = ['user'=>$req->input('user'), 'admin'=>$admin];
        $req->session()->put('login', $login);
        return response('login OK', 200);
    } 
    else {
        $req->session()->flush();
        return response('Erro no login', 404);
    }
});
