<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlocacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alocacoes')->insert(['desenvolvedor_id'=>1, 'projeto_id'=>1, 'horas_semanais'=>11]);
        DB::table('alocacoes')->insert(['desenvolvedor_id'=>2, 'projeto_id'=>2, 'horas_semanais'=>13]);
        DB::table('alocacoes')->insert(['desenvolvedor_id'=>3, 'projeto_id'=>3, 'horas_semanais'=>14]);
        DB::table('alocacoes')->insert(['desenvolvedor_id'=>3, 'projeto_id'=>4, 'horas_semanais'=>15]);
        DB::table('alocacoes')->insert(['desenvolvedor_id'=>2, 'projeto_id'=>4, 'horas_semanais'=>16]);
        DB::table('alocacoes')->insert(['desenvolvedor_id'=>1, 'projeto_id'=>3, 'horas_semanais'=>17]);
        DB::table('alocacoes')->insert(['desenvolvedor_id'=>2, 'projeto_id'=>2, 'horas_semanais'=>18]);
    }
}
