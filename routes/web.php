<?php

use App\Models\Cliente;
use App\Models\Endereco;
use GuzzleHttp\Client;
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

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $c) {
        echo '<p>ID: '. $c->id . '</p>';
        echo '<p>Nome: '. $c->nome . '</p>';
        echo '<p>Telefone: '. $c->telefone . '</p>';

        $e = Endereco::where('cliente_id', $c->id)->first();
        echo '<p>Rua: '. $e->rua . '</p>';
        echo '<p>Numero: '. $e->numero . '</p>';
        echo '<p>Bairro: '. $e->bairro . '</p>';
        echo '<p>Cidade: '. $e->cidade . '</p>';
        echo '<p>UF: '. $e->uf . '</p>';
        echo '<p>CEP: '. $e->cep . '</p>';
        echo '<hr>';
    }
});

Route::get('/clientescomhasone', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $c) {
        echo '<p>ID: '. $c->id . '</p>';
        echo '<p>Nome: '. $c->nome . '</p>';
        echo '<p>Telefone: '. $c->telefone . '</p>';        
        echo '<p>Rua: '. $c->endereco->rua . '</p>';
        echo '<p>Numero: '. $c->endereco->numero . '</p>';
        echo '<p>Bairro: '. $c->endereco->bairro . '</p>';
        echo '<p>Cidade: '. $c->endereco->cidade . '</p>';
        echo '<p>UF: '. $c->endereco->uf . '</p>';
        echo '<p>CEP: '. $c->endereco->cep . '</p>';
        echo '<hr>';
    }
});

Route::get('/enderecos', function () {
    $ends = Endereco::all();
    foreach ($ends as $e) {
        echo '<p>ID Cliente: '. $e->cliente_id . '</p>';
        echo '<p>Rua: '. $e->rua . '</p>';
        echo '<p>Numero: '. $e->numero . '</p>';
        echo '<p>Bairro: '. $e->bairro . '</p>';
        echo '<p>Cidade: '. $e->cidade . '</p>';
        echo '<p>UF: '. $e->uf . '</p>';
        echo '<p>CEP: '. $e->cep . '</p>';
        echo '<hr>';
    }
});

Route::get('/enderecoscombelongsto', function () {
    $ends = Endereco::all();
    foreach ($ends as $e) {
        echo '<p>ID Cliente: '. $e->cliente_id . '</p>';
        echo '<p>Nome: '. $e->cliente->nome . '</p>';
        echo '<p>Telefone: '. $e->cliente->telefone . '</p>';
        echo '<p>Rua: '. $e->rua . '</p>';
        echo '<p>Numero: '. $e->numero . '</p>';
        echo '<p>Bairro: '. $e->bairro . '</p>';
        echo '<p>Cidade: '. $e->cidade . '</p>';
        echo '<p>UF: '. $e->uf . '</p>';
        echo '<p>CEP: '. $e->cep . '</p>';
        echo '<hr>';
    }
});

Route::get('/inserir', function () {
    $c = new Cliente();
    $c->nome = "Teste Nome";
    $c->telefone = "11 97878-7878";
    $c->save();
    $e = new Endereco();
    $e->rua = "Correa de melo";
    $e->numero = "850";
    $e->bairro = "Sarandi";
    $e->cidade = "Porto Alegre";
    $e->uf = "RS";
    $e->cep = "91120-250";

    $c->endereco()->save($e);

    $c = new Cliente();
    $c->nome = "Teste Nome 2";
    $c->telefone = "12 97878-7878";
    $c->save();
    $e = new Endereco();
    $e->rua = "Correa de melo";
    $e->numero = "950";
    $e->bairro = "Sarandi";
    $e->cidade = "Porto Alegre";
    $e->uf = "RS";
    $e->cep = "91120-250";

    $c->endereco()->save($e);
    
});


// Função usa lazy loading, por isso precisa especificar o relacionamento
Route::get('/clientes/json', function () {
    // $clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get();

    return response()->json($clientes,200);
});

// Função usa Eager Loading
Route::get('/enderecos/json', function () {
    // $enderecos = Endereco::all();
    $enderecos = Endereco::with(['cliente'])->get();

    return response()->json($enderecos,200);
});