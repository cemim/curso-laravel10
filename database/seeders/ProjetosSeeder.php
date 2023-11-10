<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projetos')->insert(['nome'=>'Sistema de alocação de recursos', 'estimativa_horas'=>200]);
        DB::table('projetos')->insert(['nome'=>'Sistema de Bibliotecas', 'estimativa_horas'=>1000]);
        DB::table('projetos')->insert(['nome'=>'Sistema de vendas', 'estimativa_horas'=>2000]);
        DB::table('projetos')->insert(['nome'=>'Sistema novo', 'estimativa_horas'=>5000]);
    }
}
