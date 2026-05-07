{{-- Reusable script item card --}}
<div class="card" style="overflow:hidden;">
    <div style="display:flex;align-items:center;justify-content:space-between;padding:14px 16px;border-bottom:1px solid #f1f5f9;">
        <div style="display:flex;align-items:center;gap:10px;min-width:0;">
            <label style="display:flex;align-items:center;gap:8px;cursor:pointer;flex-shrink:0;">
                <div style="position:relative;width:40px;height:22px;">
                    <input type="checkbox"
                           name="scripts[{{ $script->key }}][is_active]"
                           value="1"
                           id="toggle_{{ $script->key }}"
                           {{ $script->is_active ? 'checked' : '' }}
                           onchange="toggleScript('{{ $script->key }}')"
                           style="opacity:0;width:0;height:0;position:absolute;">
                    <span id="track_{{ $script->key }}"
                          style="position:absolute;inset:0;border-radius:11px;cursor:pointer;transition:background .2s;background:{{ $script->is_active ? '#e67e22' : '#cbd5e1' }};">
                        <span id="thumb_{{ $script->key }}"
                              style="position:absolute;top:3px;width:16px;height:16px;background:white;border-radius:50%;transition:left .2s;left:{{ $script->is_active ? '21px' : '3px' }};"></span>
                    </span>
                </div>
            </label>
            <div style="min-width:0;">
                <div style="font-size:13.5px;font-weight:600;color:#0f172a;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $script->label }}</div>
                <div style="font-size:11px;color:#94a3b8;margin-top:1px;">
                    Posisi: <span style="font-weight:600;color:#64748b;">{{ $script->position }}</span>
                    @if($script->code)
                    · <span style="color:#22c55e;">✓ Kode tersedia</span>
                    @else
                    · <span style="color:#94a3b8;">Belum ada kode</span>
                    @endif
                </div>
            </div>
        </div>
        <button type="button" onclick="toggleCodeArea('{{ $script->key }}')"
                style="display:flex;align-items:center;gap:5px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:7px;padding:6px 12px;font-size:12px;font-weight:600;color:#475569;cursor:pointer;white-space:nowrap;flex-shrink:0;margin-left:10px;">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            Edit Kode
        </button>
    </div>

    <div id="code_{{ $script->key }}" style="display:none;padding:14px 16px;background:#f8fafc;">
        <label style="display:block;font-size:12px;font-weight:600;color:#475569;margin-bottom:6px;text-transform:uppercase;letter-spacing:.04em;">
            Embed / Script Code
        </label>
        <textarea name="scripts[{{ $script->key }}][code]"
                  rows="6"
                  placeholder="Paste kode script di sini..."
                  style="width:100%;padding:10px 12px;font-size:12.5px;font-family:'Courier New',monospace;border:1.5px solid #e2e8f0;border-radius:8px;outline:none;background:#fff;resize:vertical;line-height:1.5;transition:border-color .2s;">{{ $script->code }}</textarea>
        <p style="font-size:11px;color:#94a3b8;margin-top:6px;">HTML & JavaScript diperbolehkan. Kode akan diinjeksikan langsung ke halaman.</p>
    </div>
</div>

@once
@push('scripts')
<script>
function toggleScript(key) {
    const cb = document.getElementById('toggle_' + key);
    const track = document.getElementById('track_' + key);
    const thumb = document.getElementById('thumb_' + key);
    if (cb.checked) {
        track.style.background = '#e67e22';
        thumb.style.left = '21px';
    } else {
        track.style.background = '#cbd5e1';
        thumb.style.left = '3px';
    }
}
function toggleCodeArea(key) {
    const area = document.getElementById('code_' + key);
    area.style.display = area.style.display === 'none' ? 'block' : 'none';
}
</script>
@endpush
@endonce
