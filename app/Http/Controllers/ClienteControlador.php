<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// php artisan make:controller ClienteControlador --resource
class ClienteControlador extends Controller
{
    public function __construct()
    {
        $clientesTeste = [
            ['id'=> 1, 'nome'=>'ademir'],
            ['id'=> 2, 'nome'=>'joao'],
            ['id'=> 3, 'nome'=>'maria'],
            ['id'=> 4, 'nome'=>'aline'],
        ];

        $clientes = session('clientes');
        if(!isset($clientes)){
            session(['clientes' => $clientesTeste]);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Listar Clientes
        $clientes = session('clientes');
        $titulo = 'Todos os clientes';
        
        return view('clientes.index', 
            ['clientes'=>$clientes, 'titulo'=>$titulo]);

        //return view('clientes.index', compact(['clientes', 'titulo']));
        /* return view('clientes.index')
            ->with('clientes', $clientes)
            ->with('titulo', $titulo); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //View Criar novo cliente
        return view('clientes.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Salvar requisição da view create
        $clientes = session('clientes');
        $id = $this->createClientID();
        $nome = $request->nome;
        $dados = ['id'=>$id, 'nome'=>$nome];
        $clientes[] = $dados;

        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibir informações do cliente
        $clientes = session('clientes');
        $positionArray = array_search($id, array_column($clientes, 'id'));
        $cliente = $clientes[$positionArray];

        return view('clientes.info', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Abrir view Edit
        $clientes = session('clientes');
        $positionArray = array_search($id, array_column($clientes, 'id'));
        $cliente = $clientes[$positionArray];
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Salva informações da view edit
        $clientes = session('clientes');
        $positionArray = array_search($id, array_column($clientes, 'id'));
        $clientes[$positionArray]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Apagar Cliente
        $clientes = session('clientes');
        $positionArray = array_search($id, array_column($clientes, 'id'));
        array_splice($clientes, $positionArray, 1);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    private function createClientID(){
        $clientes = session('clientes');
        $id = 0;
        
        if (count($clientes) === 0)
            return 0;
        
        foreach( $clientes as $c){
            if($c['id'] > $id){
                $id = $c['id'];
            }
            
        }

        return $id + 1;
    }
}
