<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    function categoria() {
        return $this->belongsTo('App\Models\Categoria')->withDefault([
            'nome' => 'Sem Categoria'
        ]);
    }
}
