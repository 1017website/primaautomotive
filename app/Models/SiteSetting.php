<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'type', 'group', 'label'];

    /**
     * Get a single setting by key.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = Cache::remember("setting_{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->first();
        });

        return $setting?->value ?? $default;
    }

    /**
     * Set a single setting value.
     */
    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget("setting_{$key}");
    }

    /**
     * Get all settings for a group, keyed by key.
     */
    public static function group(string $group): \Illuminate\Support\Collection
    {
        return static::where('group', $group)->get()->keyBy('key');
    }

    /**
     * Get all settings as flat key=>value array.
     */
    public static function all_flat(): array
    {
        return Cache::remember('settings_all', 3600, function () {
            return static::all()->pluck('value', 'key')->toArray();
        });
    }

    /**
     * Clear all settings cache.
     */
    public static function clearCache(): void
    {
        Cache::forget('settings_all');
        $keys = static::pluck('key');
        foreach ($keys as $key) {
            Cache::forget("setting_{$key}");
        }
    }
}
