<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert(['nome' => 'Roupas']);
        DB::table('categorias')->insert(['nome' => 'Eletrônicos']);
        DB::table('categorias')->insert(['nome' => 'Perfumes']);
        DB::table('categorias')->insert(['nome' => 'Móveis']);
        DB::table('categorias')->insert(['nome' => 'Alimentos']);
        DB::table('categorias')->insert(['nome' => 'Informática']);
    }
}
