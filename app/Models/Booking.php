<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_code', 'customer_name', 'customer_phone', 'customer_email',
        'vehicle_brand', 'vehicle_model', 'vehicle_color', 'vehicle_plate',
        'service_type', 'damage_description', 'booking_date',
        'status', 'notes', 'progress_note', 'confirmed_at', 'completed_at',
    ];

    protected $casts = [
        'booking_date'  => 'date',
        'confirmed_at'  => 'datetime',
        'completed_at'  => 'datetime',
    ];

    public static $statusLabels = [
        'pending'     => 'Menunggu Konfirmasi',
        'confirmed'   => 'Dikonfirmasi',
        'in_progress' => 'Dalam Pengerjaan',
        'qc'          => 'Quality Control',
        'done'        => 'Selesai',
        'cancelled'   => 'Dibatalkan',
    ];

    public static $statusColors = [
        'pending'     => 'yellow',
        'confirmed'   => 'blue',
        'in_progress' => 'orange',
        'qc'          => 'purple',
        'done'        => 'green',
        'cancelled'   => 'red',
    ];

    public function getStatusLabelAttribute(): string
    {
        return static::$statusLabels[$this->status] ?? $this->status;
    }

    public function getStatusColorAttribute(): string
    {
        return static::$statusColors[$this->status] ?? 'gray';
    }

    public static function generateCode(string $brand): string
    {
        $prefix = 'PA-' . strtoupper(substr($brand, 0, 6));
        $year   = date('Y');
        $count  = static::whereYear('created_at', $year)->count() + 1;
        return "{$prefix}-{$year}-" . str_pad($count, 3, '0', STR_PAD_LEFT);
    }
}
