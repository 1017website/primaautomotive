<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'type', 'group', 'label', 'locale'];

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
     * Get a locale-aware setting.
     * If locale is 'en', tries key_en first, falls back to key.
     */
    public static function getLang(string $key, string $locale = 'id', mixed $default = null): mixed
    {
        if ($locale !== 'id') {
            $enKey = $key . '_en';
            $val   = static::get($enKey);
            if ($val !== null && $val !== '') return $val;
        }
        return static::get($key, $default);
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
     * Get locale-aware flat array.
     * For each key that has a _en variant, override value if locale = en.
     */
    public static function all_flat_lang(string $locale = 'id'): array
    {
        $all = static::all_flat();
        if ($locale === 'id') return $all;

        // For each _en key, override the base key's value
        foreach ($all as $key => $value) {
            if (str_ends_with($key, '_en') && $value !== null && $value !== '') {
                $baseKey = substr($key, 0, -3); // remove _en
                if (array_key_exists($baseKey, $all)) {
                    $all[$baseKey] = $value;
                }
            }
        }
        return $all;
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
