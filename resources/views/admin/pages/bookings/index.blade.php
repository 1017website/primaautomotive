@extends('admin.layouts.app')
@section('title', 'Booking')
@section('breadcrumb', 'Main → Booking')
@section('header_actions')
<a href="{{ route('admin.bookings.create') }}" class="btn-primary">
    <i data-lucide="plus" class="w-4 h-4"></i> Booking Baru
</a>
@endsection

@section('content')
{{-- Filter --}}
<div class="card p-4 mb-5">
    <form method="GET" class="flex flex-wrap gap-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, kode, telepon..."
               class="form-input w-64 h-9">
        <select name="status" class="form-select w-48 h-9">
            <option value="">Semua Status</option>
            @foreach($statuses as $val => $label)
            <option value="{{ $val }}" {{ request('status') === $val ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-primary h-9">Filter</button>
        @if(request('search') || request('status'))
        <a href="{{ route('admin.bookings.index') }}" class="btn-secondary h-9">Reset</a>
        @endif
    </form>
</div>

<div class="card">
    <table class="cms-table w-full">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Pelanggan</th>
                <th>Kendaraan</th>
                <th>Layanan</th>
                <th>Tgl Booking</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $b)
            <tr>
                <td class="font-mono text-xs font-bold text-gray-600">{{ $b->booking_code }}</td>
                <td>
                    <div class="font-semibold text-sm">{{ $b->customer_name }}</div>
                    <div class="text-xs text-gray-400">{{ $b->customer_phone }}</div>
                </td>
                <td class="text-sm">{{ $b->vehicle_brand }} {{ $b->vehicle_model }}</td>
                <td class="text-xs text-gray-500">{{ Str::limit($b->service_type, 25) }}</td>
                <td class="text-xs text-gray-500">{{ $b->booking_date?->format('d M Y') ?? '-' }}</td>
                <td><span class="badge badge-{{ $b->status_color }}">{{ $b->status_label }}</span></td>
                <td>
                    <div class="flex gap-1.5">
                        <a href="{{ route('admin.bookings.show', $b) }}" class="btn-secondary py-1 px-2 text-xs">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                        </a>
                        <a href="{{ route('admin.bookings.edit', $b) }}" class="btn-secondary py-1 px-2 text-xs">
                            <i data-lucide="pencil" class="w-3 h-3"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.bookings.destroy', $b) }}"
                              onsubmit="return confirm('Hapus booking ini?')">
                            @csrf @method('DELETE')
                            <button class="btn-danger py-1 px-2 text-xs"><i data-lucide="trash-2" class="w-3 h-3"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-gray-400 py-10">Belum ada booking.</td></tr>
            @endforelse
        </tbody>
    </table>

    @if($bookings->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">
        {{ $bookings->links() }}
    </div>
    @endif
</div>
@endsection
