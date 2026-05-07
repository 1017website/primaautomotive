@extends('admin.layouts.app')
@section('title', $booking->exists ? 'Edit Booking: ' . $booking->booking_code : 'Booking Baru')

@section('content')
<div class="max-w-3xl">
<div class="card p-6">
    <form method="POST"
          action="{{ $booking->exists ? route('admin.bookings.update', $booking) : route('admin.bookings.store') }}">
        @csrf
        @if($booking->exists) @method('PUT') @endif

        {{-- Pelanggan --}}
        <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
            <i data-lucide="user" class="w-4 h-4 text-primary"></i> Data Pelanggan
        </h3>
        <div class="grid sm:grid-cols-3 gap-4 mb-6">
            <div class="md:col-span-1">
                <label class="form-label">Nama <span class="text-red-500">*</span></label>
                <input type="text" name="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" class="form-input" required>
            </div>
            <div>
                <label class="form-label">Telepon <span class="text-red-500">*</span></label>
                <input type="text" name="customer_phone" value="{{ old('customer_phone', $booking->customer_phone) }}" class="form-input" required>
            </div>
            <div>
                <label class="form-label">Email</label>
                <input type="email" name="customer_email" value="{{ old('customer_email', $booking->customer_email) }}" class="form-input">
            </div>
        </div>

        {{-- Kendaraan --}}
        <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2 pt-4 border-t border-gray-100">
            <i data-lucide="car" class="w-4 h-4 text-primary"></i> Data Kendaraan
        </h3>
        <div class="grid sm:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="form-label">Merk <span class="text-red-500">*</span></label>
                <input type="text" name="vehicle_brand" value="{{ old('vehicle_brand', $booking->vehicle_brand) }}" class="form-input" placeholder="Toyota, Honda, BMW...">
            </div>
            <div>
                <label class="form-label">Model <span class="text-red-500">*</span></label>
                <input type="text" name="vehicle_model" value="{{ old('vehicle_model', $booking->vehicle_model) }}" class="form-input" placeholder="Avanza, Civic, X5...">
            </div>
            <div>
                <label class="form-label">Warna</label>
                <input type="text" name="vehicle_color" value="{{ old('vehicle_color', $booking->vehicle_color) }}" class="form-input">
            </div>
            <div>
                <label class="form-label">Plat Nomor</label>
                <input type="text" name="vehicle_plate" value="{{ old('vehicle_plate', $booking->vehicle_plate) }}" class="form-input" placeholder="L 1234 AB">
            </div>
        </div>

        {{-- Layanan --}}
        <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2 pt-4 border-t border-gray-100">
            <i data-lucide="wrench" class="w-4 h-4 text-primary"></i> Layanan & Status
        </h3>
        <div class="grid sm:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="form-label">Jenis Layanan <span class="text-red-500">*</span></label>
                <input type="text" name="service_type" value="{{ old('service_type', $booking->service_type) }}" class="form-input" placeholder="Perbaikan Body, Ceramic Coating...">
            </div>
            <div>
                <label class="form-label">Tanggal Booking</label>
                <input type="date" name="booking_date" value="{{ old('booking_date', $booking->booking_date?->format('Y-m-d')) }}" class="form-input">
            </div>
            <div class="md:col-span-2">
                <label class="form-label">Deskripsi Kerusakan</label>
                <textarea name="damage_description" rows="3" class="form-textarea">{{ old('damage_description', $booking->damage_description) }}</textarea>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="form-label">Status <span class="text-red-500">*</span></label>
                <select name="status" class="form-select">
                    @foreach($statuses as $val => $label)
                    <option value="{{ $val }}" {{ old('status', $booking->status ?? 'pending') === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">Progress Note (tampil ke pelanggan saat tracking)</label>
            <textarea name="progress_note" rows="3" class="form-textarea" placeholder="cth: Kendaraan sedang dalam tahap pengecatan bagian kanan...">{{ old('progress_note', $booking->progress_note) }}</textarea>
        </div>

        <div>
            <label class="form-label">Catatan Internal (tidak tampil ke pelanggan)</label>
            <textarea name="notes" rows="2" class="form-textarea">{{ old('notes', $booking->notes) }}</textarea>
        </div>

        <div class="flex gap-3 mt-8 pt-5 border-t border-gray-100">
            <button type="submit" class="btn-primary">
                <i data-lucide="save" class="w-4 h-4"></i>
                {{ $booking->exists ? 'Simpan Perubahan' : 'Buat Booking' }}
            </button>
            <a href="{{ route('admin.bookings.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
</div>
@endsection
