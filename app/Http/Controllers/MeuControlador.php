<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//php artisan make:controller MeuControlador
class MeuControlador extends Controller
{
    public function produtos(){
        return view('outras.produtos');
    }

    public function getNome(){
        return 'Teste';
    }

    public function getIdade(){
        return "30";
    }

    public function multiplicar($n1, $n2){
        return $n1*$n2;
    }
}
