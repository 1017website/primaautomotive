@extends('admin.layouts.app')
@section('title', $service->exists ? 'Edit Layanan' : 'Tambah Layanan')
@section('breadcrumb', 'Layanan → ' . ($service->exists ? 'Edit' : 'Tambah'))

@section('content')
<div class="max-w-2xl">
<div class="card p-6">
    <form method="POST"
          action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}">
        @csrf
        @if($service->exists) @method('PUT') @endif

        <div class="grid md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
                <label class="form-label">Judul Layanan <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" class="form-input" required>
            </div>
            <div>
                <label class="form-label">Badge</label>
                <input type="text" name="badge" value="{{ old('badge', $service->badge) }}" class="form-input" placeholder="cth: Perbaikan Tabrakan">
            </div>
            <div>
                <label class="form-label">Icon (Lucide name)</label>
                <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="form-input" placeholder="wrench">
                <p class="text-xs text-gray-400 mt-1">Cek: <a href="https://lucide.dev/icons/" target="_blank" class="text-primary">lucide.dev/icons</a></p>
            </div>
            <div class="md:col-span-2">
                <label class="form-label">Gradient Background</label>
                <input type="text" name="gradient" value="{{ old('gradient', $service->gradient) }}" class="form-input" placeholder="from-blue-500 to-cyan-500">
                <p class="text-xs text-gray-400 mt-1">Gunakan class Tailwind gradient, misal: <code>from-emerald-400 to-teal-500</code></p>
            </div>
            <div class="md:col-span-2">
                <label class="form-label">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="description" rows="4" class="form-textarea" required>{{ old('description', $service->description) }}</textarea>
            </div>
            <div class="md:col-span-2">
                <label class="form-label">Fitur / List (satu per baris)</label>
                <textarea name="features" rows="6" class="form-textarea" placeholder="Pengecatan Warna Standar&#10;Perbaikan Panel Plastik&#10;...">{{ old('features', is_array($service->features) ? implode("\n", $service->features) : '') }}</textarea>
            </div>
            <div>
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" class="form-input">
            </div>
            <div class="flex items-end pb-1">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 accent-primary">
                    <span class="text-sm font-medium text-gray-700">Aktif / Tampilkan</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 mt-8 pt-5 border-t border-gray-100">
            <button type="submit" class="btn-primary">
                <i data-lucide="save" class="w-4 h-4"></i>
                {{ $service->exists ? 'Simpan Perubahan' : 'Tambah Layanan' }}
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
</div>
@endsection
