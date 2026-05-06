@extends('admin.layouts.app')
@section('title', 'Ulasan')
@section('breadcrumb', 'Konten → Ulasan')
@section('header_actions')
<a href="{{ route('admin.reviews.create') }}" class="btn-primary">
    <i data-lucide="plus" class="w-4 h-4"></i> Tambah Ulasan
</a>
@endsection

@section('content')
<div class="card">
    <table class="table w-full">
        <thead>
            <tr>
                <th>Urutan</th>
                <th>Nama</th>
                <th>Bintang</th>
                <th>Ulasan</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviews as $review)
            <tr>
                <td class="w-16 text-center font-bold text-gray-400">{{ $review->sort_order }}</td>
                <td>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br {{ $review->avatar_color }} rounded-full flex items-center justify-center text-white text-xs font-bold">
                            {{ $review->initials }}
                        </div>
                        <span class="font-semibold text-gray-800">{{ $review->name }}</span>
                    </div>
                </td>
                <td>
                    <div class="flex gap-0.5">
                        @for($i = 0; $i < $review->stars; $i++)
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-yellow-400 text-yellow-400"></i>
                        @endfor
                    </div>
                </td>
                <td class="max-w-xs">
                    <span class="text-xs text-gray-500">{{ Str::limit($review->content, 70) }}</span>
                </td>
                <td class="text-xs text-gray-400">{{ $review->time_ago }}</td>
                <td>
                    @if($review->is_active)
                    <span class="badge badge-green">Aktif</span>
                    @else
                    <span class="badge badge-gray">Non-aktif</span>
                    @endif
                </td>
                <td>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.reviews.edit', $review) }}" class="btn-secondary py-1.5 px-3 text-xs">
                            <i data-lucide="pencil" class="w-3 h-3"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}"
                              onsubmit="return confirm('Hapus ulasan ini?')">
                            @csrf @method('DELETE')
                            <button class="btn-danger py-1.5 px-3 text-xs"><i data-lucide="trash-2" class="w-3 h-3"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-gray-400 py-10">Belum ada ulasan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
