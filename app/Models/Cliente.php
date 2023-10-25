<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// php artisan make:model Cliente -m
class Cliente extends Model
{
    use HasFactory;

    public function endereco() {
        // return $this->hasOne('App\Models\endereco');
        // Específicando a tabela, quando não seguem o padrão de nomenclatura:
        return $this->hasOne('App\Models\endereco', 'cliente_id', 'id');
    }
}
