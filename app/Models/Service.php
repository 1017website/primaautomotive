<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'badge',
        'badge_en',
        'description',
        'description_en',
        'icon',
        'gradient',
        'features',
        'features_en',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        // Tidak cast features di sini — kita handle manual agar aman
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getLocalTitle(string $locale = 'id'): string
    {
        return ($locale !== 'id' && $this->title_en) ? $this->title_en : ($this->title ?? '');
    }

    public function getLocalBadge(string $locale = 'id'): ?string
    {
        return ($locale !== 'id' && $this->badge_en) ? $this->badge_en : $this->badge;
    }

    public function getLocalDescription(string $locale = 'id'): string
    {
        return ($locale !== 'id' && $this->description_en) ? $this->description_en : ($this->description ?? '');
    }

    public function getLocalFeatures(string $locale = 'id'): array
    {
        $raw = ($locale !== 'id' && $this->features_en) ? $this->features_en : $this->features;
        return $this->decodeFeatures($raw);
    }

    /** Safely decode features regardless of whether it's already array, JSON string, or null */
    private function decodeFeatures(mixed $raw): array
    {
        if (is_array($raw)) return $raw;
        if (is_null($raw) || $raw === '') return [];
        if (is_string($raw)) {
            $decoded = json_decode($raw, true);
            return is_array($decoded) ? $decoded : [];
        }
        return [];
    }
}
