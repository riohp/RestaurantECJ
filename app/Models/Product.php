<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

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



    /**
     * Verify if the user is active.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }



}
