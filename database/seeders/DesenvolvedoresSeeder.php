<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('desenvolvedores')->insert(['nome'=>'Bernardo', 'cargo'=>'Analista Pleno']);
        DB::table('desenvolvedores')->insert(['nome'=>'Carlos', 'cargo'=>'Analista Senior']);
        DB::table('desenvolvedores')->insert(['nome'=>'Filipe', 'cargo'=>'Desenvolvedor Jr']);
    }
}
