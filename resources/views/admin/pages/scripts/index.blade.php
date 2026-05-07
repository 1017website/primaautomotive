@extends('admin.layouts.app')
@section('title', 'Ads, Analytics & Embed')
@section('breadcrumb', 'Integrasi → Ads & Scripts')

@section('content')
<form method="POST" action="{{ route('admin.scripts.update') }}">
    @csrf
    <div style="display:grid;gap:20px;">

        {{-- ===== ADS ===== --}}
        <div class="card" style="padding:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;padding-bottom:14px;border-bottom:1px solid #f1f5f9;">
                <div style="width:34px;height:34px;background:#fff7ed;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#e67e22" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                </div>
                <div>
                    <div style="font-size:14px;font-weight:700;color:#0f172a;">Iklan (Ads)</div>
                    <div style="font-size:12px;color:#64748b;">Google Ads, Meta Pixel, TikTok Pixel — paste script ke field lalu aktifkan</div>
                </div>
            </div>
            <div style="display:grid;gap:12px;">
                @foreach($scripts->get('ads', collect()) as $script)
                @include('admin.partials.script-item', ['script' => $script])
                @endforeach
            </div>
        </div>

        {{-- ===== ANALYTICS ===== --}}
        <div class="card" style="padding:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;padding-bottom:14px;border-bottom:1px solid #f1f5f9;">
                <div style="width:34px;height:34px;background:#eff6ff;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </div>
                <div>
                    <div style="font-size:14px;font-weight:700;color:#0f172a;">Analytics & Tag Manager</div>
                    <div style="font-size:12px;color:#64748b;">Google Tag Manager, Google Analytics 4</div>
                </div>
            </div>
            <div style="display:grid;gap:12px;">
                @foreach($scripts->get('analytics', collect()) as $script)
                @include('admin.partials.script-item', ['script' => $script])
                @endforeach
            </div>
        </div>

        {{-- ===== ELFSIGHT ===== --}}
        <div class="card" style="padding:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px;padding-bottom:14px;border-bottom:1px solid #f1f5f9;">
                <div style="width:34px;height:34px;background:#f0fdf4;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div>
                    <div style="font-size:14px;font-weight:700;color:#0f172a;">Elfsight Widgets</div>
                    <div style="font-size:12px;color:#64748b;">Google Reviews, Instagram Feed, WhatsApp Button</div>
                </div>
            </div>

            {{-- Step by step guide --}}
            <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:14px 16px;margin-bottom:16px;">
                <div style="font-size:12.5px;font-weight:700;color:#0f172a;margin-bottom:8px;">📋 Cara Pasang Elfsight:</div>
                <ol style="font-size:12.5px;color:#475569;line-height:2;margin:0;padding-left:18px;">
                    <li>Daftar/login di <a href="https://elfsight.com" target="_blank" style="color:#e67e22;font-weight:600;">elfsight.com</a></li>
                    <li>Buat widget (misal: Google Reviews) → klik <strong>Publish</strong></li>
                    <li>Copy <strong>Install code</strong> — terdiri dari 2 bagian: <code style="background:#e2e8f0;padding:1px 5px;border-radius:3px;font-size:11px;">&lt;script&gt;</code> dan <code style="background:#e2e8f0;padding:1px 5px;border-radius:3px;font-size:11px;">&lt;div class="elfsight-app-..."&gt;</code></li>
                    <li>Paste bagian <code style="background:#e2e8f0;padding:1px 5px;border-radius:3px;font-size:11px;">&lt;script src="static.elfsight.com/..."&gt;</code> ke field <strong>"Elfsight Loader"</strong> → aktifkan</li>
                    <li>Paste bagian <code style="background:#e2e8f0;padding:1px 5px;border-radius:3px;font-size:11px;">&lt;div class="elfsight-app-..."&gt;</code> ke field widget yang sesuai → aktifkan</li>
                    <li>Simpan → refresh website</li>
                </ol>
                <div style="margin-top:10px;padding-top:10px;border-top:1px dashed #e2e8f0;font-size:12px;color:#64748b;">
                    💡 <strong>Widget Google Reviews</strong> tampil di section Ulasan. &nbsp;
                    💡 <strong>Widget Instagram</strong> tampil sebelum footer. &nbsp;
                    💡 <strong>WhatsApp Button</strong> tampil floating di semua halaman.
                </div>
            </div>

            <div style="display:grid;gap:12px;">
                @foreach($scripts->get('embed', collect()) as $script)
                @include('admin.partials.script-item', ['script' => $script])
                @endforeach
            </div>
        </div>

        {{-- ===== CUSTOM ===== --}}
        <div class="card" style="padding:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;padding-bottom:14px;border-bottom:1px solid #f1f5f9;">
                <div style="width:34px;height:34px;background:#fdf4ff;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                </div>
                <div>
                    <div style="font-size:14px;font-weight:700;color:#0f172a;">Custom Script</div>
                    <div style="font-size:12px;color:#64748b;">Kode bebas — diinjeksikan ke head atau sebelum &lt;/body&gt;</div>
                </div>
            </div>
            <div style="display:grid;gap:12px;">
                @foreach($scripts->get('custom', collect()) as $script)
                @include('admin.partials.script-item', ['script' => $script])
                @endforeach
            </div>
        </div>

    </div>

    <div style="margin-top:20px;padding-top:20px;border-top:1px solid #e2e8f0;display:flex;align-items:center;gap:12px;">
        <button type="submit" class="btn-primary">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
            Simpan Semua
        </button>
        <span style="font-size:12px;color:#94a3b8;">Perubahan langsung aktif setelah disimpan</span>
    </div>
</form>
@endsection
