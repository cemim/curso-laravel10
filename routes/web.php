<?php

use App\Models\Categoria;
use App\Models\Produto;
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

Route::get('/categorias', function () {
    $cat = Categoria::all();
    if(count($cat) === 0){
        echo '<h4>Você não possui nenhuma categoria cadastrada</h4>';
    } else{
        foreach ($cat as $c) {
            echo '<p>' . $c->id . ' - ' . $c->nome . '</p>';
        }
    }
});

Route::get('/produtos', function () {
    $prod = Produto::all();
    if(count($prod) === 0){
        echo '<h4>Você não possui nenhum produto cadastrado</h4>';
    } else{
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<td>Nome</td>';
        echo '<td>Estoque</td>';
        echo '<td>Preço</td>';
        echo '<td>Categoria</td>';        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($prod as $p) {
            echo '<tr>';
            echo '<td>' . $p->nome . '</td>';
            echo '<td>' . $p->estoque . '</td>';
            echo '<td>' . $p->preco . '</td>';
            echo '<td>' . $p->categoria->nome . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';    
    }
});

Route::get('/categoriasprodutos', function () {
    $cat = Categoria::all();
    if(count($cat) === 0){
        echo '<h4>Você não possui nenhuma categoria cadastrada</h4>';
    } else{
        foreach ($cat as $c) {
            echo '<p>' . $c->id . ' - ' . $c->nome . '</p>';
            $produtos = $c->produtos;

            if (count($produtos) > 0) {
                echo '<ul>';
                foreach ($produtos as $p) {
                    echo '<li>' . $p->nome . '</li>';
                }
                echo '</ul>';
            }
        }
    }
});

Route::get('/categoriasprodutos/json', function () {
    // Eager Loading
    $cat = Categoria::with('produtos')->get();

    return response()->json($cat, 200);
});

Route::get('/adicionarproduto', function () {
    $cat = Categoria::find(1);
    $p = new Produto();
    $p->nome = "Meu Novo Produto";
    $p->estoque = 10;
    $p->preco = 100;
    $p->categoria()->associate($cat);
    $p->save();
    return response()->json($p, 200);
});

Route::get('/removercategoriaproduto', function () {    
    $p = Produto::find(10);
    
    if(isset($p)){
        $p->categoria()->dissociate();
        $p->save();
    }    
    
    return response()->json($p, 200);
});

Route::get('/adicionarproduto/{catid}', function ($catid) {
    $cat = Categoria::with('produtos')->find($catid);
    $p = new Produto();
    $p->nome = "Meu Novo Produto adicionado";
    $p->estoque = 30;
    $p->preco = 400;
    
    if(isset($cat)) {
        $cat->produtos()->save($p);
    }
    
    $cat->load('produtos');
    return response()->json($cat, 200);
});