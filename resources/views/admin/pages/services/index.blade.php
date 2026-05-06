@extends('admin.layouts.app')
@section('title', 'Layanan')
@section('breadcrumb', 'Konten → Layanan')
@section('header_actions')
<a href="{{ route('admin.services.create') }}" class="btn-primary">
    <i data-lucide="plus" class="w-4 h-4"></i> Tambah Layanan
</a>
@endsection

@section('content')
<div class="card">
    <table class="cms-table w-full">
        <thead>
            <tr>
                <th>Urutan</th>
                <th>Layanan</th>
                <th>Badge</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
            <tr>
                <td class="w-16 text-center font-bold text-gray-400">{{ $service->sort_order }}</td>
                <td>
                    <div class="font-semibold text-gray-800">{{ $service->title }}</div>
                    <div class="text-xs text-gray-400 mt-0.5">{{ Str::limit($service->description, 80) }}</div>
                </td>
                <td>
                    @if($service->badge)
                    <span class="badge badge-gray">{{ $service->badge }}</span>
                    @endif
                </td>
                <td>
                    @if($service->is_active)
                    <span class="badge badge-green">Aktif</span>
                    @else
                    <span class="badge badge-gray">Non-aktif</span>
                    @endif
                </td>
                <td>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn-secondary py-1.5 px-3 text-xs">
                            <i data-lucide="pencil" class="w-3 h-3"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
                              onsubmit="return confirm('Hapus layanan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-danger py-1.5 px-3 text-xs">
                                <i data-lucide="trash-2" class="w-3 h-3"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center text-gray-400 py-10">Belum ada layanan. <a href="{{ route('admin.services.create') }}" class="text-primary">Tambah sekarang</a></td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
