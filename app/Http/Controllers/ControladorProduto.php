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
    public function indexView()
    {
        return view('produtos.produtos');
    }

    public function index(){        
        $prods = DB::table('produtos')                    
        ->leftjoin('categorias', 'produtos.categoria_id', '=', 'categorias.id')
        ->select('produtos.*','categorias.nome as nome_categoria')        
        ->get();         
        return response()->json($prods, 200);
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
        $prod->nome = $request->input("nome");
        $prod->estoque = $request->input("estoque");
        $prod->preco = $request->input("preco");
        $prod->categoria_id = $request->input("categoria_id");        
        $prod->save();
        
        $categoria = Categoria::find($prod->categoria_id);
        $prod->nome_categoria = $categoria->nome;
        return response()->json($prod, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prod = Produto::find($id);
        if(isset($prod)){
            return response()->json($prod, 200);
        }
        return response()->json('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prod = Produto::find($id);
        
        if(isset($prod)){
            $prod->nome = $request->input("nome");
            $prod->estoque = $request->input("estoque");
            $prod->preco = $request->input("preco");
            $prod->categoria_id = $request->input("categoria_id");        
            $prod->save();

            $categoria = Categoria::find($prod->categoria_id);
            $prod->nome_categoria = $categoria->nome;
            return response()->json($prod, 200); 
        }

        return response()->json('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Produto::destroy($id);
        // return redirect()->route('produtos.index');
        $prod = Produto::find($id);
        if(isset($prod)) {
            $prod->delete();
        }
    }
}
