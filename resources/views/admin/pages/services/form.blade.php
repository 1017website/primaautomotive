@extends('admin.layouts.app')
@section('title', $service->exists ? 'Edit Layanan' : 'Tambah Layanan')
@section('breadcrumb', 'Layanan → ' . ($service->exists ? 'Edit' : 'Tambah'))

@section('content')
<div style="max-width:720px;">
<div class="card" style="padding:24px;">
    <form method="POST"
          action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}">
        @csrf
        @if($service->exists) @method('PUT') @endif

        {{-- Language Tabs --}}
        <div style="display:flex;gap:0;margin-bottom:24px;border-bottom:2px solid #e2e8f0;">
            <button type="button" onclick="switchTab('id')" id="stab-id"
                    style="padding:10px 20px;font-size:13px;font-weight:700;border:none;background:none;cursor:pointer;border-bottom:2px solid #e67e22;margin-bottom:-2px;color:#e67e22;">
                🇮🇩 Indonesia
            </button>
            <button type="button" onclick="switchTab('en')" id="stab-en"
                    style="padding:10px 20px;font-size:13px;font-weight:700;border:none;background:none;cursor:pointer;border-bottom:2px solid transparent;margin-bottom:-2px;color:#94a3b8;">
                🇺🇸 English
            </button>
        </div>

        {{-- ===== SHARED (always visible) ===== --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid #f1f5f9;">
            <div>
                <label class="form-label">Icon (Lucide)</label>
                <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="form-input" placeholder="wrench">
                <p style="font-size:11px;color:#94a3b8;margin-top:4px;">Cek: <a href="https://lucide.dev/icons/" target="_blank" style="color:#e67e22;">lucide.dev/icons</a></p>
            </div>
            <div>
                <label class="form-label">Gradient</label>
                <input type="text" name="gradient" value="{{ old('gradient', $service->gradient) }}" class="form-input" placeholder="from-blue-500 to-cyan-500">
            </div>
            <div>
                <label class="form-label">Urutan</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" class="form-input">
            </div>
            <div style="display:flex;align-items:flex-end;padding-bottom:2px;">
                <label style="display:flex;align-items:center;gap:8px;cursor:pointer;">
                    <input type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                           style="width:16px;height:16px;accent-color:#e67e22;">
                    <span style="font-size:13px;font-weight:600;color:#374151;">Aktif / Tampilkan</span>
                </label>
            </div>
        </div>

        {{-- ===== INDONESIA TAB ===== --}}
        <div id="sfields-id">
            <div style="display:grid;gap:16px;">
                <div>
                    <label class="form-label">Judul <span style="color:#e67e22;">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Badge</label>
                    <input type="text" name="badge" value="{{ old('badge', $service->badge) }}" class="form-input" placeholder="cth: Perbaikan Tabrakan">
                </div>
                <div>
                    <label class="form-label">Deskripsi <span style="color:#e67e22;">*</span></label>
                    <textarea name="description" rows="4" class="form-textarea" required>{{ old('description', $service->description) }}</textarea>
                </div>
                <div>
                    <label class="form-label">Fitur / List (satu per baris)</label>
                    <textarea name="features" rows="6" class="form-textarea" placeholder="Pengecatan Warna Standar&#10;Perbaikan Panel Plastik&#10;...">{{ old('features', is_array($service->features) ? implode("\n", $service->features) : '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- ===== ENGLISH TAB ===== --}}
        <div id="sfields-en" style="display:none;">
            <div style="background:#fffbf5;border:1px solid #fed7aa;border-radius:10px;padding:12px 14px;margin-bottom:16px;font-size:12.5px;color:#9a3412;">
                💡 Kosongkan = menggunakan versi Bahasa Indonesia sebagai fallback.
            </div>
            <div style="display:grid;gap:16px;">
                <div>
                    <label class="form-label">Title (EN)</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $service->title_en) }}" class="form-input" placeholder="Leave empty to use Indonesian version">
                </div>
                <div>
                    <label class="form-label">Badge (EN)</label>
                    <input type="text" name="badge_en" value="{{ old('badge_en', $service->badge_en) }}" class="form-input">
                </div>
                <div>
                    <label class="form-label">Description (EN)</label>
                    <textarea name="description_en" rows="4" class="form-textarea" placeholder="Leave empty to use Indonesian version">{{ old('description_en', $service->description_en) }}</textarea>
                </div>
                <div>
                    <label class="form-label">Features / List EN (one per line)</label>
                    <textarea name="features_en" rows="6" class="form-textarea" placeholder="Standard Color Painting&#10;Plastic Panel Repair&#10;...">{{ old('features_en', is_array($service->features_en) ? implode("\n", $service->features_en) : '') }}</textarea>
                </div>
            </div>
        </div>

        <div style="display:flex;gap:10px;margin-top:24px;padding-top:20px;border-top:1px solid #e2e8f0;">
            <button type="submit" class="btn-primary">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                {{ $service->exists ? 'Simpan' : 'Tambah Layanan' }}
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
</div>

@push('scripts')
<script>
function switchTab(lang) {
    ['id','en'].forEach(l => {
        const active = l === lang;
        document.getElementById('stab-' + l).style.borderBottomColor = active ? '#e67e22' : 'transparent';
        document.getElementById('stab-' + l).style.color = active ? '#e67e22' : '#94a3b8';
        document.getElementById('sfields-' + l).style.display = active ? 'block' : 'none';
    });
}
</script>
@endpush
@endsection
