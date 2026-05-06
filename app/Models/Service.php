<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Service extends Model
{
    protected $fillable = [
        'title', 'badge', 'description', 'icon',
        'gradient', 'features', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'features'  => 'json',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}
