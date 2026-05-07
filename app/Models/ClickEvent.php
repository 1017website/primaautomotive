<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClickEvent extends Model
{
    public $timestamps = false;

    protected $fillable = ['event', 'label', 'page', 'ip', 'device', 'clicked_at'];

    protected $casts = ['clicked_at' => 'datetime'];

    public static $labels = [
        'wa_chat'          => 'WhatsApp Chat',
        'wa_float'         => 'WA Floating Button',
        'phone_call'       => 'Klik Telepon',
        'book_appointment' => 'Buat Janji',
        'maps_open'        => 'Buka Google Maps',
        'google_review'    => 'Lihat Google Review',
        'track_vehicle'    => 'Lacak Kendaraan',
        'contact_form'     => 'Kirim Form Kontak',
    ];

    public static function totalThisMonth(string $event = null): int
    {
        $q = static::whereYear('clicked_at', now()->year)
                   ->whereMonth('clicked_at', now()->month);
        if ($event) $q->where('event', $event);
        return $q->count();
    }

    public static function totalToday(string $event = null): int
    {
        $q = static::whereDate('clicked_at', today());
        if ($event) $q->where('event', $event);
        return $q->count();
    }

    public static function breakdown(): \Illuminate\Support\Collection
    {
        return static::selectRaw('event, COUNT(*) as total')
            ->whereYear('clicked_at', now()->year)
            ->whereMonth('clicked_at', now()->month)
            ->groupBy('event')
            ->orderByDesc('total')
            ->get();
    }

    public static function dailyChart(int $days = 30): array
    {
        $rows = static::selectRaw('DATE(clicked_at) as date, COUNT(*) as total')
            ->where('clicked_at', '>=', now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $result = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $result[] = [
                'date'  => now()->subDays($i)->format('d M'),
                'total' => $rows[$date]->total ?? 0,
            ];
        }
        return $result;
    }
}
