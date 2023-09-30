<?php

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

Route::get('/laravel', function () {
    return view('welcome');
});

// Parametros não precisam ter o mesmo nome, mas é aconselhado as boas práticas é que tenham o mesmo nome
Route::get('/teste/{nome}/{sobrenome}', function($nome1, $sobrenome1){
    return 'Olá ' . $nome1 . ' ' . $sobrenome1;
});

// Parametros opcionais
Route::get('/teste-nome/{nome?}', function($nome=null){
    if(isset($nome)){
        return 'Olá ' . $nome;
    } else{
        return 'Você não digitou nenhum nome!';
    }
    
});

// Rota com regras
Route::get('/rotacomregras/{nome}/{n}', function($nome, $n){
    for ($i=0; $i < $n; $i++) { 
        echo 'Olá ' . $nome . ' ' . $i . '<br>';    
    }
    
})->where('nome','[A-Za-z]+')
->where('n', '[0-9]+');

// Agrupando rotas
Route::prefix('/app')->group(function(){
    Route::get('/', function(){
        return view('app');
    })->name('app');

    // /app/user
    Route::get('/user', function(){
        return view('user');
    })->name('app.user');

    // /app/profile
    Route::get('/profile', function(){
        return view('profile');
    })->name('profile');

});

Route::get('/produtos', function(){
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebooks</li>";
    echo "<li>Impressoras</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');

// Redirect
Route::redirect('todosprodutos1', 'produtos', 301);

// Mais utilizado
Route::get('todosprodutos2', function(){
    return redirect()->route('meusprodutos');
});

//Requisições
Route::post('/requisicoes', function(Request $request){
    return 'Hello Post';
});
Route::delete('/requisicoes', function(Request $request){
    return 'Hello Delete';
});
Route::put('/requisicoes', function(Request $request){
    return 'Hello Put';
});
Route::patch('/requisicoes', function(Request $request){
    return 'Hello Patch';
});
Route::options('/requisicoes', function(Request $request){
    return 'Hello Options';
});
Route::get('/requisicoes', function(Request $request){
    return 'Hello Get';
});