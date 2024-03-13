<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookingCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'cooking_id',
    ];
}
