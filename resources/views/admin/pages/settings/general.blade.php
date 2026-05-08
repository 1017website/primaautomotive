@extends('admin.layouts.app')
@section('title', 'Pengaturan: Umum')
@section('breadcrumb', 'Pengaturan → Umum')

@section('content')
<div style="max-width:720px;">

    <form method="POST" action="{{ route('admin.settings.update', 'general') }}" enctype="multipart/form-data">
        @csrf

        {{-- LOGO SECTION --}}
        <div class="card" style="padding:24px;margin-bottom:16px;">
            <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0 0 18px;display:flex;align-items:center;gap:8px;">
                <span style="width:28px;height:28px;background:#fff7ed;border-radius:7px;display:inline-flex;align-items:center;justify-content:center;">🖼</span>
                Logo & Identitas
            </h3>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px;">

                {{-- Logo warna --}}
                @if(isset($settings['site_logo']))
                @php $s = $settings['site_logo']; @endphp
                <div>
                    <label class="form-label">{{ $s->label ?? 'Logo (warna)' }}</label>
                    @if($s->value)
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;padding:10px;background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0;">
                        <img src="{{ $s->value }}" alt="Logo" style="height:48px;width:auto;object-fit:contain;max-width:120px;">
                        <span style="font-size:11px;color:#94a3b8;">Gambar saat ini</span>
                    </div>
                    @endif
                    <input type="file" name="site_logo" accept="image/*" style="font-size:13px;color:#64748b;width:100%;">
                    <p style="font-size:11px;color:#94a3b8;margin:4px 0 0;">PNG/SVG transparan. Tampil di navbar.</p>
                </div>
                @endif

                {{-- Logo putih --}}
                @if(isset($settings['site_logo_white']))
                @php $s = $settings['site_logo_white']; @endphp
                <div>
                    <label class="form-label">{{ $s->label ?? 'Logo (putih)' }}</label>
                    @if($s->value)
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;padding:10px;background:#0a1628;border-radius:8px;">
                        <img src="{{ $s->value }}" alt="Logo Putih" style="height:48px;width:auto;object-fit:contain;max-width:120px;">
                        <span style="font-size:11px;color:#64748b;">Gambar saat ini</span>
                    </div>
                    @endif
                    <input type="file" name="site_logo_white" accept="image/*" style="font-size:13px;color:#64748b;width:100%;">
                    <p style="font-size:11px;color:#94a3b8;margin:4px 0 0;">PNG/SVG putih. Tampil di sidebar & footer.</p>
                </div>
                @endif
            </div>

            {{-- Nama website --}}
            @if(isset($settings['site_name']))
            <div>
                <label class="form-label">{{ $settings['site_name']->label ?? 'Nama Website' }}</label>
                <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name']->value) }}" class="form-input">
            </div>
            @endif
        </div>

        {{-- FAVICON SECTION --}}
        <div class="card" style="padding:24px;margin-bottom:16px;">
            <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0 0 6px;display:flex;align-items:center;gap:8px;">
                <span style="width:28px;height:28px;background:#eff6ff;border-radius:7px;display:inline-flex;align-items:center;justify-content:center;">🌐</span>
                Favicon
            </h3>
            <p style="font-size:12.5px;color:#64748b;margin:0 0 18px;">Icon kecil yang tampil di tab browser — frontend, admin, dan booking page sekaligus.</p>

            @if(isset($settings['seo_favicon']))
            @php $fav = $settings['seo_favicon']; @endphp
            <div style="display:flex;align-items:start;gap:24px;flex-wrap:wrap;">

                {{-- Preview --}}
                <div style="flex-shrink:0;">
                    <div style="font-size:11px;color:#94a3b8;font-weight:600;margin-bottom:8px;text-transform:uppercase;letter-spacing:.05em;">Preview</div>
                    @if($fav->value)
                    <div style="border:1px solid #e2e8f0;border-radius:10px;padding:12px 16px;background:#f8fafc;display:flex;flex-direction:column;gap:10px;min-width:200px;">
                        {{-- Browser tab mockup --}}
                        <div style="background:#e2e8f0;border-radius:6px;padding:6px 10px;display:flex;align-items:center;gap:6px;">
                            <img src="{{ $fav->value }}" style="width:16px;height:16px;object-fit:contain;">
                            <span style="font-size:11px;color:#374151;font-weight:500;">Prima Automotive</span>
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" style="margin-left:auto;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        </div>
                        <span style="font-size:11px;color:#22c55e;text-align:center;">✓ Favicon aktif</span>
                    </div>
                    @else
                    <div style="border:1.5px dashed #e2e8f0;border-radius:10px;padding:20px;text-align:center;min-width:160px;">
                        <div style="font-size:28px;margin-bottom:6px;">🌐</div>
                        <span style="font-size:11px;color:#94a3b8;">Belum ada favicon</span>
                    </div>
                    @endif
                </div>

                {{-- Upload --}}
                <div style="flex:1;min-width:200px;">
                    <label class="form-label">Upload Favicon</label>
                    <input type="file" name="seo_favicon" accept="image/x-icon,image/png,image/svg+xml,image/*"
                           style="font-size:13px;color:#64748b;width:100%;margin-bottom:8px;">
                    <div style="background:#f8fafc;border-radius:8px;padding:10px 12px;font-size:12px;color:#64748b;line-height:1.8;">
                        <strong style="color:#374151;">Format yang direkomendasikan:</strong><br>
                        • <code style="background:#e2e8f0;padding:1px 4px;border-radius:3px;">.ico</code> — paling kompatibel di semua browser<br>
                        • <code style="background:#e2e8f0;padding:1px 4px;border-radius:3px;">.png</code> — 32×32px atau 64×64px<br>
                        • <code style="background:#e2e8f0;padding:1px 4px;border-radius:3px;">.svg</code> — scalable, modern browser<br>
                        Ukuran maks: 512KB
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div style="display:flex;gap:10px;">
            <button type="submit" class="btn-primary">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Simpan Perubahan
            </button>
            <span style="font-size:12px;color:#94a3b8;align-self:center;">Logo & Favicon berlaku di semua halaman</span>
        </div>
    </form>
</div>
@endsection
