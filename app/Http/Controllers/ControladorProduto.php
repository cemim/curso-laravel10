<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Comando cria controlador com o CRUD pronto
// php artisan make:controller ControladorProduto --resource
class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $produtos = DB::table('produtos')                    
        ->leftjoin('categorias', 'produtos.categoria_id', '=', 'categorias.id')
        ->select('produtos.*','categorias.nome as nome_categoria')        
        ->get(); 
        return view('produtos.produtos', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Categoria::all();
        return view('produtos.formproduto', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prod = new Produto();
        $prod->nome = $request->input("nomeProduto");
        $prod->estoque = $request->input("qtd");
        $prod->preco = $request->input("preco");
        $prod->categoria_id = $request->input("categoria");        
        $prod->save();
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {        
        $prod = Produto::find($id);
        if(isset($prod)){
            $cat = Categoria::all();
            return view('produtos.formproduto', compact('prod', 'cat'));
        }
        return redirect()->route('produtos.index'); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prod = Produto::find($id);
        if(isset($prod)){
            $prod->nome = $request->input("nomeProduto");
            $prod->estoque = $request->input("qtd");
            $prod->preco = $request->input("preco");
            $prod->categoria_id = $request->input("categoria");        
            $prod->save();
        }
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produto::destroy($id);
        return redirect()->route('produtos.index');
    }
}
