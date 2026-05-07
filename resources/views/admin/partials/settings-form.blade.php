{{-- Regular settings form (no bilingual) --}}
<form method="POST" action="{{ route('admin.settings.update', $group) }}" enctype="multipart/form-data">
    @csrf
    <div style="display:grid;gap:18px;">
        @foreach($settings as $key => $setting)
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
                    <input type="file" name="{{ $setting->key }}" accept="image/*" style="font-size:13px;color:#64748b;">
                    <p style="font-size:11px;color:#94a3b8;margin:0;">JPG, PNG, WebP. Maks 2MB. Kosongkan jika tidak ingin mengganti.</p>
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

    <div style="display:flex;gap:10px;margin-top:24px;padding-top:20px;border-top:1px solid #e2e8f0;">
        <button type="submit" class="btn-primary">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
            Simpan Perubahan
        </button>
    </div>
</form>
