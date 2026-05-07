@extends('admin.layouts.app')
@section('title', 'Detail Booking: ' . $booking->booking_code)
@section('breadcrumb', 'Booking → Detail')

@section('header_actions')
<a href="{{ route('admin.bookings.edit', $booking) }}" class="btn-primary">
    <i data-lucide="pencil" class="w-4 h-4"></i> Edit Status
</a>
@endsection

@section('content')
<div class="grid lg:grid-cols-3 gap-5">

    {{-- Info Utama --}}
    <div class="lg:col-span-2 space-y-5">
        <div class="card p-6">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <div class="text-xs text-gray-400 mb-1">Kode Booking</div>
                    <div class="font-mono font-bold text-xl text-gray-900">{{ $booking->booking_code }}</div>
                </div>
                <span class="badge badge-{{ $booking->status_color }} text-sm px-3 py-1">{{ $booking->status_label }}</span>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-xs font-semibold uppercase text-gray-400 tracking-wide mb-3">Data Pelanggan</h4>
                    <div class="space-y-2 text-sm">
                        <div><span class="text-gray-500">Nama:</span> <span class="font-medium">{{ $booking->customer_name }}</span></div>
                        <div><span class="text-gray-500">Telepon:</span> <a href="tel:{{ $booking->customer_phone }}" class="font-medium text-primary">{{ $booking->customer_phone }}</a></div>
                        @if($booking->customer_email)
                        <div><span class="text-gray-500">Email:</span> <span class="font-medium">{{ $booking->customer_email }}</span></div>
                        @endif
                    </div>
                </div>
                <div>
                    <h4 class="text-xs font-semibold uppercase text-gray-400 tracking-wide mb-3">Data Kendaraan</h4>
                    <div class="space-y-2 text-sm">
                        <div><span class="text-gray-500">Merk:</span> <span class="font-medium">{{ $booking->vehicle_brand }}</span></div>
                        <div><span class="text-gray-500">Model:</span> <span class="font-medium">{{ $booking->vehicle_model }}</span></div>
                        @if($booking->vehicle_color)
                        <div><span class="text-gray-500">Warna:</span> <span class="font-medium">{{ $booking->vehicle_color }}</span></div>
                        @endif
                        @if($booking->vehicle_plate)
                        <div><span class="text-gray-500">Plat:</span> <span class="font-medium font-mono">{{ $booking->vehicle_plate }}</span></div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-5 pt-5 border-t border-gray-100 text-sm space-y-2">
                <div><span class="text-gray-500">Jenis Layanan:</span> <span class="font-medium">{{ $booking->service_type }}</span></div>
                @if($booking->damage_description)
                <div><span class="text-gray-500">Deskripsi Kerusakan:</span></div>
                <p class="text-gray-700 bg-gray-50 rounded-lg p-3">{{ $booking->damage_description }}</p>
                @endif
                @if($booking->booking_date)
                <div><span class="text-gray-500">Tanggal Booking:</span> <span class="font-medium">{{ $booking->booking_date->format('d M Y') }}</span></div>
                @endif
            </div>
        </div>

        @if($booking->progress_note)
        <div class="card p-6">
            <h4 class="font-semibold text-gray-800 mb-2 flex items-center gap-2">
                <i data-lucide="message-square" class="w-4 h-4 text-primary"></i>
                Progress Note (tampil ke pelanggan)
            </h4>
            <p class="text-gray-700 text-sm bg-orange-50 rounded-lg p-4 border border-orange-100">{{ $booking->progress_note }}</p>
        </div>
        @endif
    </div>

    {{-- Sidebar --}}
    <div class="space-y-4">
        {{-- Timeline --}}
        <div class="card p-5">
            <h4 class="font-semibold text-gray-800 mb-4 text-sm">Timeline</h4>
            <div class="space-y-3 text-xs">
                <div class="flex gap-3">
                    <div class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="plus-circle" class="w-3 h-3 text-gray-500"></i>
                    </div>
                    <div><div class="font-medium text-gray-700">Dibuat</div><div class="text-gray-400">{{ $booking->created_at->format('d M Y, H:i') }}</div></div>
                </div>
                @if($booking->confirmed_at)
                <div class="flex gap-3">
                    <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="check" class="w-3 h-3 text-blue-600"></i>
                    </div>
                    <div><div class="font-medium text-gray-700">Dikonfirmasi</div><div class="text-gray-400">{{ $booking->confirmed_at->format('d M Y, H:i') }}</div></div>
                </div>
                @endif
                @if($booking->completed_at)
                <div class="flex gap-3">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="check-circle" class="w-3 h-3 text-green-600"></i>
                    </div>
                    <div><div class="font-medium text-gray-700">Selesai</div><div class="text-gray-400">{{ $booking->completed_at->format('d M Y, H:i') }}</div></div>
                </div>
                @endif
            </div>
        </div>

        @if($booking->notes)
        <div class="card p-5">
            <h4 class="font-semibold text-gray-800 mb-2 text-sm">Catatan Internal</h4>
            <p class="text-sm text-gray-600">{{ $booking->notes }}</p>
        </div>
        @endif

        {{-- Quick WA --}}
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->customer_phone) }}?text={{ urlencode('Halo ' . $booking->customer_name . ', mengenai booking ' . $booking->booking_code . ':') }}"
           target="_blank" class="btn-primary w-full justify-center">
            <i data-lucide="message-circle" class="w-4 h-4"></i> Chat WhatsApp
        </a>
        <a href="{{ route('admin.bookings.index') }}" class="btn-secondary w-full justify-center">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
        </a>
    </div>
</div>
@endsection
