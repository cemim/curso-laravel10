<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// php artisan make:model Brand
class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name'];
}
