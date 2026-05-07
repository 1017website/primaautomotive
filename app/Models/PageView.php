<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PageView extends Model
{
    public $timestamps = false;

    protected $fillable = ['page', 'ip', 'user_agent', 'referer', 'country', 'device', 'locale', 'visited_at'];

    protected $casts = ['visited_at' => 'datetime'];

    public static function record(Request $request): void
    {
        // Skip admin, assets, and bot-like requests
        $path = $request->path();
        if (str_starts_with($path, 'admin') ||
            str_starts_with($path, '_') ||
            str_contains($path, '.')) return;

        static::create([
            'page'       => '/' . $path,
            'ip'         => $request->ip(),
            'user_agent' => substr($request->userAgent() ?? '', 0, 255),
            'referer'    => substr($request->header('referer') ?? '', 0, 255),
            'device'     => static::detectDevice($request->userAgent() ?? ''),
            'locale'     => app()->getLocale(),
            'visited_at' => now(),
        ]);
    }

    private static function detectDevice(string $ua): string
    {
        $ua = strtolower($ua);
        if (str_contains($ua, 'mobile') || str_contains($ua, 'android') || str_contains($ua, 'iphone')) {
            return 'mobile';
        }
        if (str_contains($ua, 'tablet') || str_contains($ua, 'ipad')) {
            return 'tablet';
        }
        return 'desktop';
    }

    // ===== STATS HELPERS =====

    public static function totalToday(): int
    {
        return static::whereDate('visited_at', today())->count();
    }

    public static function totalThisMonth(): int
    {
        return static::whereYear('visited_at', now()->year)
                     ->whereMonth('visited_at', now()->month)
                     ->count();
    }

    public static function totalAllTime(): int
    {
        return static::count();
    }

    public static function uniqueToday(): int
    {
        return static::whereDate('visited_at', today())
                     ->distinct('ip')->count('ip');
    }

    public static function uniqueThisMonth(): int
    {
        return static::whereYear('visited_at', now()->year)
                     ->whereMonth('visited_at', now()->month)
                     ->distinct('ip')->count('ip');
    }

    /** Last N days chart data */
    public static function dailyChart(int $days = 30): array
    {
        $rows = static::selectRaw('DATE(visited_at) as date, COUNT(*) as total, COUNT(DISTINCT ip) as unique_visitors')
            ->where('visited_at', '>=', now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $result = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $result[] = [
                'date'    => now()->subDays($i)->format('d M'),
                'total'   => $rows[$date]->total ?? 0,
                'unique'  => $rows[$date]->unique_visitors ?? 0,
            ];
        }
        return $result;
    }

    public static function deviceBreakdown(): array
    {
        return static::selectRaw('device, COUNT(*) as total')
            ->whereMonth('visited_at', now()->month)
            ->groupBy('device')
            ->pluck('total', 'device')
            ->toArray();
    }

    public static function localeBreakdown(): array
    {
        return static::selectRaw('locale, COUNT(*) as total')
            ->whereMonth('visited_at', now()->month)
            ->groupBy('locale')
            ->pluck('total', 'locale')
            ->toArray();
    }

    public static function topPages(int $limit = 5): \Illuminate\Support\Collection
    {
        return static::selectRaw('page, COUNT(*) as total')
            ->whereMonth('visited_at', now()->month)
            ->groupBy('page')
            ->orderByDesc('total')
            ->limit($limit)
            ->get();
    }
}
