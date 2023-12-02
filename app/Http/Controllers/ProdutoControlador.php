<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ProdutoAdmin;
use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    private $produtos = ['Tv 40', 'Notebook Acer', 'Impressora HP', 'HD Externo'];

    public function __construct() {
        $this->middleware(ProdutoAdmin::class);
    }

    public function index() {
        echo '<h3>Produtos</h3>';
        echo '<ol>';
        foreach($this->produtos as $p) {
            echo '<li>' . $p . '</li>';
        }
        echo '</ol>';
    }
}
