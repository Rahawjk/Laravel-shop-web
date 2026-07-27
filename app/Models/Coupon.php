<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'type',
        'value',
        'min_order_amount',
        'usage_limit',
        'used_count',
        'expires_at',
        'is_active'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function isValid()
    {
        return $this->is_active &&
            ($this->expires_at === null || $this->expires_at->isFuture()) &&
            ($this->usage_limit === null || $this->used_count < $this->usage_limit);
    }
}