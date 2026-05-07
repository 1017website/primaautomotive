{{--
    Bilingual Settings Form
    Usage: @include('admin.partials.settings-form-bilingual', ['settings' => $settings, 'group' => 'hero'])
--}}
<form method="POST" action="{{ route('admin.settings.update', $group) }}" enctype="multipart/form-data">
    @csrf

    {{-- Language Tabs --}}
    <div style="display:flex;gap:0;margin-bottom:24px;border-bottom:2px solid #e2e8f0;">
        <button type="button" onclick="switchLangTab('id')" id="tab-id"
                style="padding:10px 20px;font-size:13px;font-weight:700;border:none;background:none;cursor:pointer;border-bottom:2px solid #e67e22;margin-bottom:-2px;color:#e67e22;display:flex;align-items:center;gap:6px;">
            🇮🇩 Bahasa Indonesia
        </button>
        <button type="button" onclick="switchLangTab('en')" id="tab-en"
                style="padding:10px 20px;font-size:13px;font-weight:700;border:none;background:none;cursor:pointer;border-bottom:2px solid transparent;margin-bottom:-2px;color:#94a3b8;display:flex;align-items:center;gap:6px;">
            🇺🇸 English
        </button>
    </div>

    {{-- ===== INDONESIAN FIELDS ===== --}}
    <div id="fields-id">
        <div style="display:grid;gap:18px;">
            @foreach($settings->filter(fn($s) => !str_ends_with($s->key, '_en')) as $key => $setting)
            <div>
                <label class="form-label">{{ $setting->label ?? $setting->key }}</label>

                @if($setting->type === 'textarea')
                    <textarea name="{{ $setting->key }}" rows="4" class="form-textarea">{{ old($setting->key, $setting->value) }}</textarea>

                @elseif($setting->type === 'image')
                    <div style="display:flex;flex-direction:column;gap:8px;">
                        @if($setting->value)
                        <div style="display:flex;align-items:center;gap:10px;">
                            <img src="{{ $setting->value }}" alt="preview" style="width:80px;height:56px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0;">
                            <span style="font-size:12px;color:#94a3b8;">Gambar saat ini</span>
                        </div>
                        @endif
                        <input type="file" name="{{ $setting->key }}" accept="image/*"
                               style="font-size:13px;color:#64748b;">
                        <p style="font-size:11px;color:#94a3b8;margin:0;">JPG, PNG, WebP. Maks 2MB.</p>
                    </div>

                @elseif($setting->type === 'boolean')
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;">
                        <input type="checkbox" name="{{ $setting->key }}" value="1"
                               {{ old($setting->key, $setting->value) ? 'checked' : '' }}
                               style="width:16px;height:16px;accent-color:#e67e22;">
                        <span style="font-size:13px;color:#64748b;">Aktif</span>
                    </label>

                @else
                    <input type="text" name="{{ $setting->key }}"
                           value="{{ old($setting->key, $setting->value) }}"
                           class="form-input">
                @endif
            </div>
            @endforeach
        </div>
    </div>

    {{-- ===== ENGLISH FIELDS ===== --}}
    <div id="fields-en" style="display:none;">
        @php $enSettings = $settings->filter(fn($s) => str_ends_with($s->key, '_en')); @endphp

        @if($enSettings->isEmpty())
        <div style="padding:32px;text-align:center;background:#f8fafc;border-radius:10px;border:1px dashed #e2e8f0;">
            <div style="font-size:13px;color:#94a3b8;">Tidak ada field bahasa Inggris untuk section ini.</div>
            <div style="font-size:12px;color:#cbd5e1;margin-top:4px;">Label dan teks UI diatur di <code>lang/en/frontend.php</code></div>
        </div>
        @else
        <div style="background:#fffbf5;border:1px solid #fed7aa;border-radius:10px;padding:12px 14px;margin-bottom:16px;font-size:12.5px;color:#9a3412;">
            💡 Field kosong = menggunakan versi Bahasa Indonesia sebagai fallback.
        </div>
        <div style="display:grid;gap:18px;">
            @foreach($enSettings as $key => $setting)
            @php
                // Derive a clean label by removing [EN] prefix if present
                $cleanLabel = str_replace('[EN] ', '', $setting->label ?? $setting->key);
            @endphp
            <div>
                <label class="form-label">{{ $cleanLabel }}</label>

                @if($setting->type === 'textarea')
                    <textarea name="{{ $setting->key }}" rows="4" class="form-textarea"
                              placeholder="Kosongkan = pakai versi Bahasa Indonesia">{{ old($setting->key, $setting->value) }}</textarea>
                @else
                    <input type="text" name="{{ $setting->key }}"
                           value="{{ old($setting->key, $setting->value) }}"
                           class="form-input"
                           placeholder="Kosongkan = pakai versi Bahasa Indonesia">
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>

    {{-- Save --}}
    <div style="display:flex;gap:10px;margin-top:24px;padding-top:20px;border-top:1px solid #e2e8f0;">
        <button type="submit" class="btn-primary">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
            Simpan Semua Perubahan
        </button>
        <span style="font-size:12px;color:#94a3b8;align-self:center;">Menyimpan ID & EN sekaligus</span>
    </div>
</form>

@push('scripts')
<script>
function switchLangTab(lang) {
    const tabs   = { id: document.getElementById('tab-id'),    en: document.getElementById('tab-en') };
    const fields = { id: document.getElementById('fields-id'), en: document.getElementById('fields-en') };

    Object.keys(tabs).forEach(l => {
        const active = l === lang;
        tabs[l].style.borderBottomColor  = active ? '#e67e22' : 'transparent';
        tabs[l].style.color              = active ? '#e67e22' : '#94a3b8';
        fields[l].style.display          = active ? 'block'   : 'none';
    });
}
</script>
@endpush
