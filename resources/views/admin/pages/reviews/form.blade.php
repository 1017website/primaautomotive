@extends('admin.layouts.app')
@section('title', $review->exists ? 'Edit Ulasan' : 'Tambah Ulasan')

@section('content')
<div class="max-w-xl">
<div class="card p-6">
    <form method="POST"
          action="{{ $review->exists ? route('admin.reviews.update', $review) : route('admin.reviews.store') }}">
        @csrf
        @if($review->exists) @method('PUT') @endif

        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="form-label">Nama <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $review->name) }}" class="form-input" required>
            </div>
            <div>
                <label class="form-label">Inisial (maks 2 huruf)</label>
                <input type="text" name="initials" value="{{ old('initials', $review->initials) }}" class="form-input" maxlength="2" placeholder="AF">
                <p class="text-xs text-gray-400 mt-1">Kosongkan = otomatis dari nama</p>
            </div>
            <div>
                <label class="form-label">Bintang</label>
                <select name="stars" class="form-select">
                    @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" {{ old('stars', $review->stars ?? 5) == $i ? 'selected' : '' }}>{{ $i }} Bintang</option>
                    @endfor
                </select>
            </div>
            <div>
                <label class="form-label">Waktu (teks)</label>
                <input type="text" name="time_ago" value="{{ old('time_ago', $review->time_ago) }}" class="form-input" placeholder="2 minggu lalu">
            </div>
            <div class="md:col-span-2">
                <label class="form-label">Warna Avatar (Tailwind gradient)</label>
                <input type="text" name="avatar_color" value="{{ old('avatar_color', $review->avatar_color ?? 'from-blue-500 to-cyan-500') }}" class="form-input">
                <p class="text-xs text-gray-400 mt-1">Contoh: <code>from-purple-500 to-pink-500</code></p>
            </div>
            <div class="md:col-span-2">
                <label class="form-label">Isi Ulasan <span class="text-red-500">*</span></label>
                <textarea name="content" rows="4" class="form-textarea" required>{{ old('content', $review->content) }}</textarea>
            </div>
            <div>
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $review->sort_order ?? 0) }}" class="form-input">
            </div>
            <div class="flex items-end pb-1">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $review->is_active ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 accent-primary">
                    <span class="text-sm font-medium text-gray-700">Aktif / Tampilkan</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 mt-8 pt-5 border-t border-gray-100">
            <button type="submit" class="btn-primary">
                <i data-lucide="save" class="w-4 h-4"></i>
                {{ $review->exists ? 'Simpan' : 'Tambah Ulasan' }}
            </button>
            <a href="{{ route('admin.reviews.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
</div>
@endsection
