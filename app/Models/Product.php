<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'is_active'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function wishlistedBy()
    {
        return $this->belongsToMany(\App\Models\User::class, 'wishlists')->withTimestamps();
    }
    public function reviews()
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
}
