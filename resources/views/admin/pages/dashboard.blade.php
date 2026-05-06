@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
{{-- Stats Grid --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @php
    $statCards = [
        ['label' => 'Total Booking',     'value' => $stats['bookings_total'],   'icon' => 'calendar-check', 'color' => 'text-blue-600',   'bg' => 'bg-blue-50'],
        ['label' => 'Menunggu Konfirmasi','value' => $stats['bookings_pending'], 'icon' => 'clock',          'color' => 'text-yellow-600', 'bg' => 'bg-yellow-50'],
        ['label' => 'Booking Selesai',   'value' => $stats['bookings_done'],    'icon' => 'check-circle',   'color' => 'text-green-600',  'bg' => 'bg-green-50'],
        ['label' => 'Pesan Belum Dibaca','value' => $stats['messages_unread'],  'icon' => 'mail',           'color' => 'text-red-600',    'bg' => 'bg-red-50'],
    ];
    @endphp

    @foreach($statCards as $card)
    <div class="card p-5">
        <div class="flex items-center justify-between mb-3">
            <span class="text-sm text-gray-500">{{ $card['label'] }}</span>
            <div class="{{ $card['bg'] }} w-9 h-9 rounded-lg flex items-center justify-center">
                <i data-lucide="{{ $card['icon'] }}" class="w-4 h-4 {{ $card['color'] }}"></i>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-gray-900">{{ $card['value'] }}</div>
    </div>
    @endforeach
</div>

<div class="grid lg:grid-cols-2 gap-6">
    {{-- Recent Bookings --}}
    <div class="card">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-800">Booking Terbaru</h3>
            <a href="{{ route('admin.bookings.index') }}" class="text-xs text-primary hover:underline">Lihat semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recent_bookings as $booking)
            <div class="flex items-center gap-3 px-5 py-3">
                <div class="w-9 h-9 bg-orange-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i data-lucide="car" class="w-4 h-4 text-primary"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold text-gray-800 truncate">{{ $booking->customer_name }}</div>
                    <div class="text-xs text-gray-400">{{ $booking->booking_code }} · {{ $booking->vehicle_brand }}</div>
                </div>
                <span class="badge badge-{{ $booking->status_color }}">{{ $booking->status_label }}</span>
            </div>
            @empty
            <div class="px-5 py-8 text-center text-sm text-gray-400">Belum ada booking</div>
            @endforelse
        </div>
    </div>

    {{-- Recent Messages --}}
    <div class="card">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-800">Pesan Terbaru</h3>
            <a href="{{ route('admin.messages.index') }}" class="text-xs text-primary hover:underline">Lihat semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recent_messages as $msg)
            <a href="{{ route('admin.messages.show', $msg) }}"
               class="flex items-start gap-3 px-5 py-3 hover:bg-gray-50 transition-colors block">
                <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i data-lucide="mail" class="w-4 h-4 text-blue-500"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-semibold text-gray-800">{{ $msg->name }}</span>
                        @if(!$msg->is_read)
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        @endif
                    </div>
                    <div class="text-xs text-gray-400 truncate">{{ Str::limit($msg->message, 60) }}</div>
                </div>
                <span class="text-xs text-gray-400 flex-shrink-0">{{ $msg->created_at->diffForHumans() }}</span>
            </a>
            @empty
            <div class="px-5 py-8 text-center text-sm text-gray-400">Belum ada pesan</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
