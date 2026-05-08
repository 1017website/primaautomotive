<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Janji — {{ $settings['site_name'] ?? 'Prima Automotive' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>tailwind.config={theme:{extend:{colors:{primary:'#e67e22','primary-dark':'#d35400',navy:'#0a1628'},fontFamily:{sans:['Inter','sans-serif']}}}}</script>
    <style>
        *{box-sizing:border-box}
        body{font-family:'Inter',sans-serif;background:#f8fafc;margin:0;}

        /* ===== STEP ANIMATIONS ===== */
        @keyframes fadeSlideIn  { from{opacity:0;transform:translateX(30px)} to{opacity:1;transform:translateX(0)} }
        @keyframes fadeSlideOut { from{opacity:1;transform:translateX(0)} to{opacity:0;transform:translateX(-30px)} }
        @keyframes fadeUp       { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }
        @keyframes scaleIn      { from{opacity:0;transform:scale(0.85)} to{opacity:1;transform:scale(1)} }
        @keyframes checkmark    { from{stroke-dashoffset:50} to{stroke-dashoffset:0} }
        @keyframes confetti     { 0%{transform:translateY(-10px) rotate(0deg);opacity:1} 100%{transform:translateY(60px) rotate(360deg);opacity:0} }

        .step-panel { display:none; animation:fadeSlideIn .35s ease-out both; }
        .step-panel.active { display:block; }
        .step-panel.leaving { animation:fadeSlideOut .25s ease-in both; }

        /* Service cards */
        .svc-card {
            border:2px solid #e2e8f0;border-radius:16px;padding:28px 24px;cursor:pointer;
            transition:all .2s ease;background:#fff;
        }
        .svc-card:hover { border-color:#e67e22;box-shadow:0 8px 30px rgba(230,126,34,.15);transform:translateY(-2px); }
        .svc-card.selected { border-color:#e67e22;background:#fff7ed;box-shadow:0 8px 30px rgba(230,126,34,.2); }
        .svc-card .icon-wrap { width:64px;height:64px;border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:16px;transition:transform .2s; }
        .svc-card:hover .icon-wrap,.svc-card.selected .icon-wrap { transform:scale(1.08); }

        /* Damage option chips */
        .damage-chip {
            border:2px solid #e2e8f0;border-radius:10px;padding:10px 14px;cursor:pointer;
            transition:all .18s;background:#fff;font-size:13.5px;font-weight:500;color:#475569;
            display:flex;align-items:center;gap:8px;
        }
        .damage-chip:hover { border-color:#e67e22;color:#e67e22; }
        .damage-chip.selected { border-color:#e67e22;background:#fff7ed;color:#e67e22; }
        .damage-chip input[type=checkbox] { width:16px;height:16px;accent-color:#e67e22;flex-shrink:0; }

        /* Form inputs */
        .fi { width:100%;height:46px;padding:0 14px;font-size:14px;border:1.5px solid #e2e8f0;border-radius:10px;outline:none;background:#fff;transition:border-color .18s,box-shadow .18s;font-family:inherit; }
        .fi:focus { border-color:#e67e22;box-shadow:0 0 0 3px rgba(230,126,34,.12); }
        .fi.error { border-color:#ef4444;box-shadow:0 0 0 3px rgba(239,68,68,.1); }
        .fi-label { display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px; }
        .fi-wrap { margin-bottom:16px; }
        textarea.fi { height:auto;padding:12px 14px;resize:none; }
        select.fi { cursor:pointer; }

        /* Date picker */
        .date-slot {
            border:1.5px solid #e2e8f0;border-radius:10px;padding:12px;cursor:pointer;
            transition:all .18s;text-align:center;background:#fff;
        }
        .date-slot:hover { border-color:#e67e22;background:#fff7ed; }
        .date-slot.selected { border-color:#e67e22;background:#e67e22;color:#fff; }
        .date-slot.disabled { opacity:.4;cursor:not-allowed;pointer-events:none; }

        /* Progress bar */
        #progress-bar { transition:width .4s cubic-bezier(.4,0,.2,1); }

        /* Step indicators */
        .step-dot { width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;transition:all .3s;flex-shrink:0; }
        .step-dot.done { background:#e67e22;color:#fff; }
        .step-dot.active { background:#fff;border:2px solid #e67e22;color:#e67e22; }
        .step-dot.pending { background:#f1f5f9;color:#94a3b8; }

        /* Navigation buttons */
        .btn-next { display:inline-flex;align-items:center;gap:8px;background:#e67e22;color:#fff;font-weight:700;font-size:15px;padding:14px 32px;border-radius:12px;border:none;cursor:pointer;transition:all .2s;font-family:inherit;width:100%; justify-content:center; }
        .btn-next:hover:not(:disabled) { background:#d35400;transform:translateY(-1px);box-shadow:0 6px 20px rgba(230,126,34,.4); }
        .btn-next:disabled { opacity:.6;cursor:not-allowed; }
        .btn-back { display:inline-flex;align-items:center;gap:6px;background:transparent;color:#64748b;font-weight:600;font-size:14px;padding:12px 20px;border-radius:10px;border:1.5px solid #e2e8f0;cursor:pointer;transition:all .18s;font-family:inherit; }
        .btn-back:hover { background:#f8fafc;border-color:#94a3b8; }

        /* Success state */
        .success-circle { width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#22c55e,#16a34a);display:flex;align-items:center;justify-content:center;margin:0 auto 24px;animation:scaleIn .5s cubic-bezier(.175,.885,.32,1.275) both; }
        .success-check { stroke-dasharray:50;stroke-dashoffset:50;animation:checkmark .4s ease .3s both; }
        .confetti-dot { position:absolute;width:8px;height:8px;border-radius:50%;animation:confetti 1s ease-out both; }

        /* Responsive */
        @media(max-width:640px) {
            .svc-card { padding:20px 16px; }
            .btn-next { padding:14px 24px; }
        }
    </style>
</head>
<body>

{{-- ===== NAVBAR ===== --}}
<nav style="background:#fff;border-bottom:1px solid #e2e8f0;padding:0 24px;height:68px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:50;">
    <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
        @php $logo = \App\Models\SiteSetting::get('site_logo'); @endphp
        @if($logo)
        <img src="{{ $logo }}" alt="{{ $settings['site_name'] ?? 'Prima Automotive' }}" style="height:48px;width:auto;object-fit:contain;">
        @else
        <div style="width:38px;height:38px;background:linear-gradient(135deg,#e67e22,#d35400);border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
        </div>
        <div>
            <div style="font-weight:800;color:#0a1628;font-size:15px;line-height:1.2;">Prima</div>
            <div style="font-weight:700;color:#e67e22;font-size:10px;letter-spacing:.1em;">AUTOMOTIVE</div>
        </div>
        @endif
    </a>
    <a href="{{ route('home') }}" style="font-size:13px;color:#64748b;text-decoration:none;display:flex;align-items:center;gap:5px;font-weight:500;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Kembali ke Beranda
    </a>
</nav>

{{-- ===== PROGRESS BAR ===== --}}
<div style="height:4px;background:#f1f5f9;position:sticky;top:68px;z-index:40;">
    <div id="progress-bar" style="height:100%;background:linear-gradient(90deg,#e67e22,#f39c12);width:25%;"></div>
</div>

{{-- ===== MAIN ===== --}}
<div style="max-width:720px;margin:0 auto;padding:32px 16px 60px;">

    {{-- Step Indicators --}}
    <div style="display:flex;align-items:center;justify-content:center;gap:0;margin-bottom:40px;" id="step-indicators">
        @php
        $stepDefs = [
            ['label' => 'Jenis Layanan'],
            ['label' => 'Detail Kendaraan'],
            ['label' => 'Data Diri & Jadwal'],
            ['label' => 'Konfirmasi'],
        ];
        @endphp
        @foreach($stepDefs as $i => $s)
        <div style="display:flex;align-items:center;">
            <div style="display:flex;flex-direction:column;align-items:center;gap:6px;">
                <div class="step-dot {{ $i === 0 ? 'active' : 'pending' }}" id="dot-{{ $i }}">
                    <span id="dot-num-{{ $i }}">{{ $i + 1 }}</span>
                </div>
                <span style="font-size:11px;font-weight:600;color:#94a3b8;white-space:nowrap;" id="dot-label-{{ $i }}" class="hidden sm:block">{{ $s['label'] }}</span>
            </div>
            @if(!$loop->last)
            <div style="width:60px;height:2px;background:#e2e8f0;margin:0 4px 20px;" id="line-{{ $i }}"></div>
            @endif
        </div>
        @endforeach
    </div>

    {{-- ===== STEP 1: Jenis Layanan ===== --}}
    <div class="step-panel active" id="step-1">
        <div style="text-align:center;margin-bottom:32px;animation:fadeUp .4s ease both;">
            <h1 style="font-size:26px;font-weight:800;color:#0a1628;margin:0 0 8px;">Jenis Layanan Apa yang Anda Butuhkan?</h1>
            <p style="font-size:15px;color:#64748b;margin:0;">Pilih layanan yang paling sesuai dengan kondisi kendaraan Anda</p>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:32px;" id="service-grid">

            <div class="svc-card" onclick="selectService(this,'Perbaikan Pasca Kecelakaan')">
                <div class="icon-wrap" style="background:#dbeafe;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.8"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <h3 style="font-size:16px;font-weight:700;color:#0a1628;margin:0 0 8px;">Perbaikan Bodi & Cat</h3>
                <p style="font-size:13px;color:#64748b;margin:0;line-height:1.5;">Perbaikan pasca tabrakan, lecet, penyok, atau kerusakan panel bodi kendaraan.</p>
            </div>

            <div class="svc-card" onclick="selectService(this,'Pengecatan Ulang')">
                <div class="icon-wrap" style="background:#dcfce7;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="1.8"><path d="M2 13.5V20a2 2 0 002 2h16a2 2 0 002-2v-6.5"/><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M12 12v10"/></svg>
                </div>
                <h3 style="font-size:16px;font-weight:700;color:#0a1628;margin:0 0 8px;">Pengecatan Ulang</h3>
                <p style="font-size:13px;color:#64748b;margin:0;line-height:1.5;">Cat memudar, berkarat, atau ingin ganti warna? Kami kembalikan kilap aslinya.</p>
            </div>

            <div class="svc-card" onclick="selectService(this,'Ceramic Coating / PPF')">
                <div class="icon-wrap" style="background:#f3e8ff;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3 style="font-size:16px;font-weight:700;color:#0a1628;margin:0 0 8px;">Ceramic Coating / PPF</h3>
                <p style="font-size:13px;color:#64748b;margin:0;line-height:1.5;">Proteksi cat terbaik dengan Ceramic Coating atau Paint Protection Film.</p>
            </div>

            <div class="svc-card" onclick="selectService(this,'Detailing & Poles')">
                <div class="icon-wrap" style="background:#fff7ed;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#e67e22" stroke-width="1.8"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
                </div>
                <h3 style="font-size:16px;font-weight:700;color:#0a1628;margin:0 0 8px;">Detailing & Poles</h3>
                <p style="font-size:13px;color:#64748b;margin:0;line-height:1.5;">Koreksi cat, poles, dan detailing interior-eksterior untuk tampilan prima.</p>
            </div>

            <div class="svc-card" onclick="selectService(this,'Konsultasi / Estimasi Gratis')" style="grid-column:1/-1;">
                <div style="display:flex;align-items:center;gap:16px;">
                    <div class="icon-wrap" style="background:#f0fdf4;margin:0;flex-shrink:0;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="1.8"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <div>
                        <h3 style="font-size:16px;font-weight:700;color:#0a1628;margin:0 0 4px;">Konsultasi & Estimasi Gratis</h3>
                        <p style="font-size:13px;color:#64748b;margin:0;">Belum yakin? Bawa kendaraan Anda untuk konsultasi dan estimasi biaya tanpa biaya.</p>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" id="selected-service" value="">

        <p style="text-align:center;font-size:13px;color:#94a3b8;margin-bottom:20px;">Klik salah satu layanan di atas untuk melanjutkan</p>

        <button class="btn-next" onclick="goStep(2)" id="btn-step1" disabled>
            Lanjut — Detail Kendaraan
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </button>
    </div>

    {{-- ===== STEP 2: Detail Kendaraan ===== --}}
    <div class="step-panel" id="step-2">
        <div style="text-align:center;margin-bottom:32px;">
            <div style="display:inline-flex;align-items:center;gap:8px;background:#fff7ed;border:1px solid #fed7aa;border-radius:10px;padding:8px 16px;margin-bottom:16px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e67e22" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                <span style="font-size:13px;font-weight:600;color:#e67e22;" id="selected-svc-label">Layanan dipilih</span>
            </div>
            <h1 style="font-size:24px;font-weight:800;color:#0a1628;margin:0 0 8px;">Informasi Kendaraan</h1>
            <p style="font-size:14px;color:#64748b;margin:0;">Ceritakan tentang kendaraan Anda</p>
        </div>

        <div style="background:#fff;border-radius:16px;border:1px solid #e2e8f0;padding:28px;margin-bottom:24px;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                <div class="fi-wrap" style="grid-column:1/-1;">
                    <label class="fi-label">Merk Kendaraan <span style="color:#e67e22;">*</span></label>
                    <select class="fi" id="vehicle-brand" onchange="updateSummary()">
                        <option value="">-- Pilih Merk --</option>
                        @foreach(['Toyota','Honda','Suzuki','Daihatsu','Mitsubishi','Nissan','Mazda','Isuzu','BMW','Mercedes-Benz','Audi','Hyundai','Kia','Chevrolet','Ford','Lainnya'] as $brand)
                        <option value="{{ $brand }}">{{ $brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="fi-wrap">
                    <label class="fi-label">Model <span style="color:#e67e22;">*</span></label>
                    <input type="text" class="fi" id="vehicle-model" placeholder="Avanza, Civic, dll" oninput="updateSummary()">
                </div>
                <div class="fi-wrap">
                    <label class="fi-label">Tahun</label>
                    <select class="fi" id="vehicle-year">
                        <option value="">-- Tahun --</option>
                        @for($y = date('Y'); $y >= 1990; $y--)
                        <option value="{{ $y }}">{{ $y }}</option>
                        @endfor
                    </select>
                </div>
                <div class="fi-wrap">
                    <label class="fi-label">Warna</label>
                    <input type="text" class="fi" id="vehicle-color" placeholder="Putih, Hitam, Silver...">
                </div>
                <div class="fi-wrap">
                    <label class="fi-label">Nomor Polisi</label>
                    <input type="text" class="fi" id="vehicle-plate" placeholder="L 1234 AB" style="text-transform:uppercase;">
                </div>
            </div>

            {{-- Damage description --}}
            <div id="damage-section">
                <label class="fi-label" style="margin-bottom:12px;">Deskripsi Kerusakan / Keperluan</label>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:12px;" id="damage-chips">
                    @foreach(['Penyok','Lecet cat','Kaca retak','Bumper rusak','Cat pudar','Karat','Panel lepas','Lainnya'] as $opt)
                    <div class="damage-chip" onclick="toggleChip(this,'{{ $opt }}')">
                        <input type="checkbox" onclick="event.stopPropagation()">
                        {{ $opt }}
                    </div>
                    @endforeach
                </div>
                <textarea class="fi" id="damage-desc" rows="3" placeholder="Ceritakan lebih detail kondisi kendaraan atau kebutuhan Anda..."></textarea>
            </div>
        </div>

        <div style="display:flex;gap:12px;">
            <button class="btn-back" onclick="goStep(1)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 5 5 12 12 19"/></svg>
                Kembali
            </button>
            <button class="btn-next" onclick="validateStep2()" style="flex:1;">
                Lanjut — Data Diri & Jadwal
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </button>
        </div>
    </div>

    {{-- ===== STEP 3: Data Diri + Jadwal ===== --}}
    <div class="step-panel" id="step-3">
        <div style="text-align:center;margin-bottom:32px;">
            <h1 style="font-size:24px;font-weight:800;color:#0a1628;margin:0 0 8px;">Data Diri & Pilih Jadwal</h1>
            <p style="font-size:14px;color:#64748b;margin:0;">Kami akan konfirmasi jadwal Anda dalam 1x24 jam</p>
        </div>

        <div style="background:#fff;border-radius:16px;border:1px solid #e2e8f0;padding:28px;margin-bottom:20px;">
            <h3 style="font-size:15px;font-weight:700;color:#0a1628;margin:0 0 18px;">Data Diri</h3>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                <div class="fi-wrap" style="grid-column:1/-1;">
                    <label class="fi-label">Nama Lengkap <span style="color:#e67e22;">*</span></label>
                    <input type="text" class="fi" id="cust-name" placeholder="Nama lengkap Anda" oninput="updateSummary()">
                </div>
                <div class="fi-wrap">
                    <label class="fi-label">Nomor HP / WhatsApp <span style="color:#e67e22;">*</span></label>
                    <input type="tel" class="fi" id="cust-phone" placeholder="08xx-xxxx-xxxx">
                </div>
                <div class="fi-wrap">
                    <label class="fi-label">Email <span style="color:#64748b;font-weight:400;">(opsional)</span></label>
                    <input type="email" class="fi" id="cust-email" placeholder="email@example.com">
                </div>
            </div>
        </div>

        {{-- Date picker --}}
        <div style="background:#fff;border-radius:16px;border:1px solid #e2e8f0;padding:28px;margin-bottom:20px;">
            <h3 style="font-size:15px;font-weight:700;color:#0a1628;margin:0 0 6px;">Pilih Tanggal (Opsional)</h3>
            <p style="font-size:12.5px;color:#64748b;margin:0 0 18px;">Bengkel buka Senin–Sabtu, 08.00–17.00. Kami akan konfirmasi ketersediaan.</p>

            <div style="display:grid;grid-template-columns:repeat(7,1fr);gap:6px;" id="date-grid">
                {{-- Generated by JS --}}
            </div>

            <input type="hidden" id="selected-date">

            <div style="margin-top:16px;">
                <label class="fi-label">Catatan Tambahan <span style="color:#64748b;font-weight:400;">(opsional)</span></label>
                <textarea class="fi" id="booking-notes" rows="2" placeholder="Preferensi waktu, pertanyaan khusus, dll..."></textarea>
            </div>
        </div>

        <div style="display:flex;gap:12px;">
            <button class="btn-back" onclick="goStep(2)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 5 5 12 12 19"/></svg>
                Kembali
            </button>
            <button class="btn-next" onclick="validateStep3()" style="flex:1;">
                Review Booking
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </button>
        </div>
    </div>

    {{-- ===== STEP 4: Konfirmasi ===== --}}
    <div class="step-panel" id="step-4">
        <div style="text-align:center;margin-bottom:32px;">
            <h1 style="font-size:24px;font-weight:800;color:#0a1628;margin:0 0 8px;">Konfirmasi Booking</h1>
            <p style="font-size:14px;color:#64748b;margin:0;">Periksa kembali detail booking Anda</p>
        </div>

        {{-- Summary Card --}}
        <div style="background:#fff;border-radius:16px;border:1px solid #e2e8f0;overflow:hidden;margin-bottom:20px;">
            <div style="background:#0a1628;padding:16px 24px;display:flex;align-items:center;gap:12px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                <div>
                    <div style="font-size:11px;color:#94a3b8;font-weight:500;">Layanan Dipilih</div>
                    <div style="font-size:15px;font-weight:700;color:#fff;" id="sum-service">—</div>
                </div>
            </div>
            <div style="padding:20px 24px;display:grid;gap:14px;">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                    <div>
                        <div style="font-size:11px;color:#94a3b8;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px;">Kendaraan</div>
                        <div style="font-size:14px;font-weight:600;color:#0f172a;" id="sum-vehicle">—</div>
                    </div>
                    <div>
                        <div style="font-size:11px;color:#94a3b8;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px;">Nama</div>
                        <div style="font-size:14px;font-weight:600;color:#0f172a;" id="sum-name">—</div>
                    </div>
                    <div>
                        <div style="font-size:11px;color:#94a3b8;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px;">Telepon</div>
                        <div style="font-size:14px;font-weight:600;color:#0f172a;" id="sum-phone">—</div>
                    </div>
                    <div>
                        <div style="font-size:11px;color:#94a3b8;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px;">Tanggal</div>
                        <div style="font-size:14px;font-weight:600;color:#0f172a;" id="sum-date">Akan dikonfirmasi</div>
                    </div>
                </div>
                <div id="sum-damage-wrap" style="display:none;">
                    <div style="font-size:11px;color:#94a3b8;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px;">Keterangan</div>
                    <div style="font-size:13.5px;color:#374151;background:#f8fafc;border-radius:8px;padding:10px 12px;" id="sum-damage">—</div>
                </div>
            </div>
        </div>

        {{-- Guarantees --}}
        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin-bottom:20px;">
            @foreach([
                ['✓','Garansi 6-24 Bulan','Garansi resmi untuk setiap pekerjaan'],
                ['📞','Konfirmasi 1x24 Jam','Tim kami akan segera menghubungi Anda'],
                ['🔒','Data Aman','Informasi Anda terjaga dengan baik'],
            ] as [$icon, $title, $desc])
            <div style="background:#f8fafc;border-radius:12px;padding:14px;text-align:center;">
                <div style="font-size:22px;margin-bottom:6px;">{{ $icon }}</div>
                <div style="font-size:12px;font-weight:700;color:#0f172a;margin-bottom:4px;">{{ $title }}</div>
                <div style="font-size:11px;color:#64748b;line-height:1.4;">{{ $desc }}</div>
            </div>
            @endforeach
        </div>

        <div id="submit-error" style="display:none;background:#fff1f2;border:1px solid #fecdd3;border-radius:10px;padding:12px 16px;font-size:13px;color:#dc2626;margin-bottom:16px;"></div>

        <div style="display:flex;gap:12px;">
            <button class="btn-back" onclick="goStep(3)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 5 5 12 12 19"/></svg>
                Kembali
            </button>
            <button class="btn-next" onclick="submitBooking()" id="submit-btn" style="flex:1;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                Konfirmasi & Kirim Booking
            </button>
        </div>
    </div>

    {{-- ===== STEP 5: SUCCESS ===== --}}
    <div class="step-panel" id="step-5" style="text-align:center;">
        <div style="position:relative;padding:40px 0;">
            <div class="success-circle">
                <svg width="40" height="40" viewBox="0 0 50 50" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                    <polyline class="success-check" points="12,26 22,36 40,16"/>
                </svg>
            </div>

            <h1 style="font-size:28px;font-weight:800;color:#0a1628;margin:0 0 12px;animation:fadeUp .5s ease .3s both;">
                Booking Berhasil! 🎉
            </h1>
            <p style="font-size:15px;color:#64748b;margin:0 0 8px;animation:fadeUp .5s ease .4s both;">
                Kode booking Anda:
            </p>
            <div style="display:inline-block;background:#0a1628;color:#fff;font-family:monospace;font-size:20px;font-weight:800;padding:10px 24px;border-radius:12px;letter-spacing:.1em;margin-bottom:24px;animation:scaleIn .5s ease .5s both;" id="success-code">
                —
            </div>

            <p style="font-size:14px;color:#64748b;max-width:400px;margin:0 auto 32px;animation:fadeUp .5s ease .6s both;line-height:1.6;">
                Tim kami akan menghubungi Anda di nomor yang tertera dalam <strong>1x24 jam</strong> untuk konfirmasi jadwal.
            </p>

            <div style="display:flex;flex-direction:column;gap:12px;max-width:360px;margin:0 auto;animation:fadeUp .5s ease .7s both;">
                <a id="success-wa" href="#" target="_blank"
                   style="display:flex;align-items:center;justify-content:center;gap:10px;background:#25d366;color:#fff;font-weight:700;font-size:15px;padding:14px 24px;border-radius:12px;text-decoration:none;transition:all .2s;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Chat WhatsApp untuk Konfirmasi
                </a>
                <a href="{{ route('home') }}"
                   style="display:flex;align-items:center;justify-content:center;gap:8px;background:#f1f5f9;color:#374151;font-weight:600;font-size:14px;padding:12px 24px;border-radius:12px;text-decoration:none;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 5 5 12 12 19"/></svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

</div>

<script>
// ===== STATE =====
let currentStep = 1;
const totalSteps = 4;
let selectedChips = [];

// ===== STEP NAVIGATION =====
function goStep(n) {
    const from = document.getElementById('step-' + currentStep);
    const to   = document.getElementById('step-' + n);
    if (!from || !to) return;

    from.classList.remove('active');
    to.classList.add('active');
    currentStep = n;
    updateProgress();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function updateProgress() {
    const pct = (currentStep / (totalSteps + 1)) * 100;
    document.getElementById('progress-bar').style.width = pct + '%';

    for (let i = 0; i < 4; i++) {
        const dot   = document.getElementById('dot-' + i);
        const num   = document.getElementById('dot-num-' + i);
        const line  = document.getElementById('line-' + i);
        if (!dot) continue;

        dot.className = 'step-dot ' + (i < currentStep - 1 ? 'done' : i === currentStep - 1 ? 'active' : 'pending');
        if (i < currentStep - 1) {
            num.innerHTML = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>';
        } else {
            num.textContent = i + 1;
        }
        if (line) line.style.background = i < currentStep - 1 ? '#e67e22' : '#e2e8f0';
    }
}

// ===== STEP 1: Service selection =====
function selectService(el, service) {
    document.querySelectorAll('.svc-card').forEach(c => c.classList.remove('selected'));
    el.classList.add('selected');
    document.getElementById('selected-service').value = service;
    document.getElementById('selected-svc-label').textContent = service;
    document.getElementById('btn-step1').disabled = false;
    document.getElementById('btn-step1').style.opacity = '1';
    updateSummary();
}

// ===== STEP 2: Chips =====
function toggleChip(el, val) {
    const cb = el.querySelector('input[type=checkbox]');
    const idx = selectedChips.indexOf(val);
    if (idx === -1) {
        selectedChips.push(val);
        el.classList.add('selected');
        cb.checked = true;
    } else {
        selectedChips.splice(idx, 1);
        el.classList.remove('selected');
        cb.checked = false;
    }
}

function validateStep2() {
    const brand = document.getElementById('vehicle-brand').value;
    const model = document.getElementById('vehicle-model').value.trim();
    if (!brand) { shake('vehicle-brand'); showToast('Pilih merk kendaraan'); return; }
    if (!model) { shake('vehicle-model'); showToast('Isi model kendaraan'); return; }
    updateSummary();
    goStep(3);
}

// ===== STEP 3: Validate =====
function validateStep3() {
    const name  = document.getElementById('cust-name').value.trim();
    const phone = document.getElementById('cust-phone').value.trim();
    if (!name)  { shake('cust-name');  showToast('Isi nama lengkap Anda'); return; }
    if (!phone) { shake('cust-phone'); showToast('Isi nomor HP / WhatsApp'); return; }
    updateSummary();
    goStep(4);
}

// ===== SUMMARY UPDATE =====
function updateSummary() {
    const svc    = document.getElementById('selected-service').value;
    const brand  = document.getElementById('vehicle-brand')?.value || '';
    const model  = document.getElementById('vehicle-model')?.value || '';
    const name   = document.getElementById('cust-name')?.value || '';
    const phone  = document.getElementById('cust-phone')?.value || '';
    const date   = document.getElementById('selected-date')?.value || '';
    const dmg    = document.getElementById('damage-desc')?.value || '';

    if (document.getElementById('sum-service')) document.getElementById('sum-service').textContent = svc || '—';
    if (document.getElementById('sum-vehicle')) document.getElementById('sum-vehicle').textContent = brand && model ? brand + ' ' + model : '—';
    if (document.getElementById('sum-name'))    document.getElementById('sum-name').textContent    = name  || '—';
    if (document.getElementById('sum-phone'))   document.getElementById('sum-phone').textContent   = phone || '—';
    if (document.getElementById('sum-date'))    document.getElementById('sum-date').textContent    = date  || 'Akan dikonfirmasi';

    const chipText = selectedChips.join(', ');
    const fullDesc = [chipText, dmg].filter(Boolean).join(' — ');
    if (document.getElementById('sum-damage')) {
        document.getElementById('sum-damage').textContent = fullDesc || '—';
        document.getElementById('sum-damage-wrap').style.display = fullDesc ? 'block' : 'none';
    }
}

// ===== DATE PICKER =====
function renderDateGrid() {
    const grid = document.getElementById('date-grid');
    if (!grid) return;
    grid.innerHTML = '';

    const today = new Date();
    for (let i = 0; i < 21; i++) {
        const d = new Date(today);
        d.setDate(today.getDate() + i + 1);
        const dow = d.getDay(); // 0=Sun, 6=Sat
        const isClosed = dow === 0; // closed Sunday
        const dateStr  = d.toISOString().split('T')[0];
        const dayNames = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];

        const slot = document.createElement('div');
        slot.className = 'date-slot' + (isClosed ? ' disabled' : '');
        slot.dataset.date = dateStr;
        slot.innerHTML = `
            <div style="font-size:10px;font-weight:600;color:inherit;opacity:.7;">${dayNames[dow]}</div>
            <div style="font-size:15px;font-weight:800;margin:2px 0;">${d.getDate()}</div>
            <div style="font-size:9px;opacity:.6;">${d.toLocaleString('id',{month:'short'})}</div>
            ${isClosed ? '<div style="font-size:8px;color:#ef4444;font-weight:600;">Tutup</div>' : ''}
        `;
        if (!isClosed) {
            slot.onclick = () => {
                document.querySelectorAll('.date-slot').forEach(s => s.classList.remove('selected'));
                slot.classList.add('selected');
                document.getElementById('selected-date').value = dateStr;
                const parts = dateStr.split('-');
                document.getElementById('sum-date').textContent = `${d.getDate()} ${d.toLocaleString('id',{month:'long'})} ${d.getFullYear()}`;
            };
        }
        grid.appendChild(slot);
    }
}

// ===== SUBMIT =====
async function submitBooking() {
    const btn = document.getElementById('submit-btn');
    const err = document.getElementById('submit-error');
    btn.disabled = true;
    btn.innerHTML = '<svg class="animate-spin" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> Mengirim...';
    err.style.display = 'none';

    // Build damage description
    const chipText = selectedChips.join(', ');
    const extraDesc = document.getElementById('damage-desc').value.trim();
    const fullDmg = [chipText, extraDesc].filter(Boolean).join(' — ');

    const payload = {
        _token:              '{{ csrf_token() }}',
        service_type:        document.getElementById('selected-service').value,
        damage_description:  fullDmg,
        vehicle_brand:       document.getElementById('vehicle-brand').value,
        vehicle_model:       document.getElementById('vehicle-model').value,
        vehicle_color:       document.getElementById('vehicle-color').value,
        vehicle_plate:       document.getElementById('vehicle-plate').value,
        vehicle_year:        document.getElementById('vehicle-year').value,
        customer_name:       document.getElementById('cust-name').value,
        customer_phone:      document.getElementById('cust-phone').value,
        customer_email:      document.getElementById('cust-email').value,
        booking_date:        document.getElementById('selected-date').value || null,
        notes:               document.getElementById('booking-notes').value,
    };

    try {
        const res  = await fetch('{{ route("booking.store") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': payload._token },
            body: JSON.stringify(payload),
        });
        const data = await res.json();

        if (data.success) {
            document.getElementById('success-code').textContent = data.booking_code;
            document.getElementById('success-wa').href = data.wa_url;
            document.getElementById('progress-bar').style.width = '100%';
            goStep(5);
        } else {
            throw new Error(data.message || 'Terjadi kesalahan');
        }
    } catch (e) {
        err.textContent = e.message || 'Gagal mengirim booking. Silakan coba lagi.';
        err.style.display = 'block';
        btn.disabled = false;
        btn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg> Konfirmasi & Kirim Booking';
    }
}

// ===== HELPERS =====
function shake(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.classList.add('error');
    el.animate([{transform:'translateX(-6px)'},{transform:'translateX(6px)'},{transform:'translateX(-4px)'},{transform:'translateX(0)'}], {duration:300});
    setTimeout(() => el.classList.remove('error'), 2000);
}

let toastTimer;
function showToast(msg) {
    let t = document.getElementById('toast');
    if (!t) {
        t = document.createElement('div');
        t.id = 'toast';
        t.style.cssText = 'position:fixed;bottom:24px;left:50%;transform:translateX(-50%);background:#0f172a;color:#fff;padding:10px 20px;border-radius:10px;font-size:13.5px;font-weight:600;z-index:9999;transition:opacity .3s;white-space:nowrap;';
        document.body.appendChild(t);
    }
    t.textContent = msg;
    t.style.opacity = '1';
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => { t.style.opacity = '0'; }, 2500);
}

// Init
document.addEventListener('DOMContentLoaded', () => {
    renderDateGrid();
    // Disable step1 button initially
    document.getElementById('btn-step1').style.opacity = '.5';
});

// Animate spin for submit loading
const style = document.createElement('style');
style.textContent = '@keyframes spin{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}.animate-spin{animation:spin 1s linear infinite}';
document.head.appendChild(style);
</script>

</body>
</html>
