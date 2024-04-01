<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'status'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'cooking_category', 'cooking_id', 'category_id');
    }
}