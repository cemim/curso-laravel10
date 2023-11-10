<?php

use App\Models\Desenvolvedor;
use App\Models\Projeto;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desenvolvedor-projetos', function(){
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach($desenvolvedores as $d){
        echo "<p>Nome: " . $d->nome . "</p>";
        echo "<p>Cargo: " . $d->cargo . "</p>";
        if(count($d->projetos)>0){
            echo "<h3>Projetos:</h3>";
            echo "<ul>";

            foreach($d->projetos as $p){
                echo "<li><b>Projeto:</b> " . $p->nome . ", <b>Estimativa:</b> " . $p->estimativa_horas . ", <b>Horas Trabalhadas:</b> " . $p->pivot->horas_semanais . "</li>";                
            }
            
            echo "</ul>";
            echo "<hr>";
        }
    }

    // return response()->json($desenvolvedores, 200);
});


Route::get('/projeto-desenvolvedores', function(){
    $projetos = Projeto::with('desenvolvedores')->get();

    foreach($projetos as $p){
        echo "<p>Projeto: " . $p->nome . "</p>";
        echo "<p>Estimativa: " . $p->estimativa_horas . "</p>";
        if(count($p->desenvolvedores)>0){
            echo "<h3>Desenvolvedores:</h3>";
            echo "<ul>";

            foreach($p->desenvolvedores as $d){
                echo "<li><b>Nome:</b> " . $d->nome . ", <b>Cargo:</b> " . $d->cargo . ", <b>Horas Trabalhadas:</b> " . $d->pivot->horas_semanais . "</li>";                
            }
            
            echo "</ul>";
            echo "<hr>";
        }
    }

    // return response()->json($projetos, 200);
});

Route::get('/alocar', function(){
    $proj = Projeto::find(4);
    
    if(isset($proj)){
        // $proj->desenvolvedores()->attach(1,['horas_semanais'=>50]);
        $proj->desenvolvedores()->attach([
            2=>['horas_semanais'=>20],
            3=>['horas_semanais'=>30],
        ]);
    }
});

Route::get('/desalocar', function(){
    $proj = Projeto::find(4);

    if(isset($proj)){        
        $proj->desenvolvedores()->detach([1,2,3]);
    }
});