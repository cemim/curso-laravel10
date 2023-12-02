<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuarioControlador extends Controller
{
    // Chamar o middle pelo construtor do controlador
    // public function __construct() {
    //     $this->middleware('primeiro');
    // }

    public function index(){
        Log::debug("UsuarioControlador::class, index");
        $retorno = '<h3>Lista de usuários</h3>';
        $retorno .= '<ul>';
        $retorno .= '<li>Joao</li>';
        $retorno .= '<li>Maria</li>';
        $retorno .= '<li>Jose</li>';
        $retorno .= '<li>Marcos</li>';
        $retorno .= '<ul>';
        return $retorno;
    }
}
