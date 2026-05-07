<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteScript extends Model
{
    protected $fillable = ['key', 'label', 'code', 'is_active', 'position', 'group'];

    protected $casts = ['is_active' => 'boolean'];

    /** Get active scripts for a position (head / body_start / body_end) */
    public static function forPosition(string $position): \Illuminate\Support\Collection
    {
        return Cache::remember("scripts_{$position}", 3600, function () use ($position) {
            return static::where('position', $position)->where('is_active', true)->get();
        });
    }

    /** Get a single inline script by key (for placement inside sections) */
    public static function inline(string $key): string
    {
        $script = Cache::remember("script_inline_{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->where('is_active', true)->first();
        });
        return $script?->code ?? '';
    }

    /** Clear all script cache */
    public static function clearCache(): void
    {
        foreach (['head', 'body_start', 'body_end'] as $pos) {
            Cache::forget("scripts_{$pos}");
        }
        // Clear inline caches
        $keys = static::pluck('key');
        foreach ($keys as $key) {
            Cache::forget("script_inline_{$key}");
        }
    }
}
