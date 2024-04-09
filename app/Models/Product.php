<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{   
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'cost',
        'category_id',
        'status',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

   public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'id', 'category_id');
    }   

    public function isActive()
    {
        return $this->status == 1;
    }
}
 