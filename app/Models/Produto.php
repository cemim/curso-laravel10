<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Comando cria a Model com a migration
// php artisan make:model Produto -m
class Produto extends Model
{
    use HasFactory;
}
