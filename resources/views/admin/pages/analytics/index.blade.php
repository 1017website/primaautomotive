@extends('admin.layouts.app')
@section('title', 'Analytics')
@section('breadcrumb', 'Main → Analytics')

@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endpush

@section('content')

{{-- ===== TOP STATS ===== --}}
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:14px;margin-bottom:20px;">

    @php
    $statCards = [
        ['label' => 'Kunjungan Hari Ini', 'value' => $views['today'],        'sub' => $views['unique_today'].' unik',   'color' => '#3b82f6', 'bg' => '#eff6ff', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
        ['label' => 'Kunjungan Bulan Ini','value' => $views['this_month'],   'sub' => $views['unique_month'].' unik',   'color' => '#8b5cf6', 'bg' => '#f5f3ff', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
        ['label' => 'Total Kunjungan',    'value' => $views['all_time'],     'sub' => 'sepanjang waktu',                 'color' => '#0ea5e9', 'bg' => '#f0f9ff', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
        ['label' => 'Klik WA Hari Ini',   'value' => $clicks['wa_today'],    'sub' => $clicks['wa_total'].' bulan ini', 'color' => '#22c55e', 'bg' => '#f0fdf4', 'icon' => 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347'],
        ['label' => 'Klik Telepon',       'value' => $clicks['phone_month'], 'sub' => 'bulan ini',                      'color' => '#f59e0b', 'bg' => '#fffbeb', 'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'],
        ['label' => 'Buat Janji',         'value' => $clicks['book_month'],  'sub' => 'bulan ini',                      'color' => '#e67e22', 'bg' => '#fff7ed', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
        ['label' => 'Buka Maps',          'value' => $clicks['maps_month'],  'sub' => 'bulan ini',                      'color' => '#ef4444', 'bg' => '#fef2f2', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z'],
        ['label' => 'Lacak Kendaraan',    'value' => $clicks['track_month'], 'sub' => 'bulan ini',                      'color' => '#06b6d4', 'bg' => '#ecfeff', 'icon' => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'],
    ];
    @endphp

    @foreach($statCards as $card)
    <div class="card" style="padding:16px;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
            <span style="font-size:11.5px;color:#64748b;font-weight:500;line-height:1.3;">{{ $card['label'] }}</span>
            <div style="width:30px;height:30px;background:{{ $card['bg'] }};border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="{{ $card['color'] }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="{{ $card['icon'] }}"/>
                </svg>
            </div>
        </div>
        <div style="font-size:26px;font-weight:800;color:#0f172a;line-height:1;">{{ number_format($card['value']) }}</div>
        <div style="font-size:11px;color:#94a3b8;margin-top:4px;">{{ $card['sub'] }}</div>
    </div>
    @endforeach
</div>

{{-- ===== BOOKING + MESSAGE SUMMARY ===== --}}
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));gap:14px;margin-bottom:20px;">
    @php
    $bookingCards = [
        ['label' => 'Total Booking',      'value' => $bookings['total'],      'color' => '#6366f1'],
        ['label' => 'Booking Bulan Ini',  'value' => $bookings['this_month'], 'color' => '#8b5cf6'],
        ['label' => 'Menunggu Konfirmasi','value' => $bookings['pending'],     'color' => '#f59e0b'],
        ['label' => 'Booking Selesai',    'value' => $bookings['done'],        'color' => '#22c55e'],
        ['label' => 'Total Pesan',        'value' => $messages['total'],       'color' => '#3b82f6'],
        ['label' => 'Pesan Bulan Ini',    'value' => $messages['this_month'],  'color' => '#0ea5e9'],
        ['label' => 'Pesan Belum Dibaca', 'value' => $messages['unread'],      'color' => '#ef4444'],
    ];
    @endphp
    @foreach($bookingCards as $bc)
    <div class="card" style="padding:14px;">
        <div style="font-size:11px;color:#64748b;font-weight:500;margin-bottom:6px;">{{ $bc['label'] }}</div>
        <div style="font-size:22px;font-weight:800;color:{{ $bc['color'] }};">{{ number_format($bc['value']) }}</div>
    </div>
    @endforeach
</div>

{{-- ===== CHARTS ROW ===== --}}
<div style="display:grid;grid-template-columns:1fr;gap:16px;margin-bottom:20px;">

    {{-- Page Views Chart --}}
    <div class="card" style="padding:20px;">
        <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0 0 16px;">Kunjungan 30 Hari Terakhir</h3>
        <canvas id="viewsChart" height="200"></canvas>
    </div>

    {{-- Click Events Chart --}}
    <div class="card" style="padding:20px;margin-top:16px;">
        <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0 0 16px;">Klik & Interaksi 30 Hari Terakhir</h3>
        <canvas id="clicksChart" height="200"></canvas>
    </div>
</div>

{{-- ===== BREAKDOWN ROW ===== --}}
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:16px;margin-bottom:20px;">

    {{-- Click Breakdown --}}
    <div class="card" style="padding:20px;">
        <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0 0 14px;">Breakdown Klik (Bulan Ini)</h3>
        @forelse($clicks['breakdown'] as $item)
        @php
            $label = \App\Models\ClickEvent::$labels[$item->event] ?? $item->event;
            $maxVal = $clicks['breakdown']->max('total');
            $pct = $maxVal > 0 ? round(($item->total / $maxVal) * 100) : 0;
        @endphp
        <div style="margin-bottom:12px;">
            <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                <span style="font-size:12.5px;color:#374151;">{{ $label }}</span>
                <span style="font-size:12.5px;font-weight:700;color:#0f172a;">{{ number_format($item->total) }}</span>
            </div>
            <div style="height:6px;background:#f1f5f9;border-radius:3px;overflow:hidden;">
                <div style="height:100%;width:{{ $pct }}%;background:#e67e22;border-radius:3px;transition:width .5s;"></div>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:24px 0;color:#94a3b8;font-size:13px;">Belum ada data klik bulan ini</div>
        @endforelse
    </div>

    {{-- Device Breakdown --}}
    <div class="card" style="padding:20px;">
        <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0 0 14px;">Perangkat (Bulan Ini)</h3>
        @php
            $deviceTotal = array_sum($deviceBreak);
            $deviceColors = ['desktop' => '#3b82f6', 'mobile' => '#e67e22', 'tablet' => '#22c55e'];
            $deviceLabels = ['desktop' => 'Desktop 🖥', 'mobile' => 'Mobile 📱', 'tablet' => 'Tablet 📟'];
        @endphp
        @if($deviceTotal > 0)
            @foreach($deviceBreak as $dev => $count)
            @php $pct = round(($count / $deviceTotal) * 100); @endphp
            <div style="margin-bottom:12px;">
                <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                    <span style="font-size:12.5px;color:#374151;">{{ $deviceLabels[$dev] ?? $dev }}</span>
                    <span style="font-size:12.5px;font-weight:700;color:#0f172a;">{{ number_format($count) }} <span style="color:#94a3b8;font-weight:400;">({{ $pct }}%)</span></span>
                </div>
                <div style="height:6px;background:#f1f5f9;border-radius:3px;overflow:hidden;">
                    <div style="height:100%;width:{{ $pct }}%;background:{{ $deviceColors[$dev] ?? '#94a3b8' }};border-radius:3px;"></div>
                </div>
            </div>
            @endforeach
        @else
        <div style="text-align:center;padding:24px 0;color:#94a3b8;font-size:13px;">Belum ada data</div>
        @endif

        {{-- Locale breakdown --}}
        <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:20px 0 14px;padding-top:16px;border-top:1px solid #f1f5f9;">Bahasa (Bulan Ini)</h3>
        @php $localeTotal = array_sum($localeBreak); @endphp
        @if($localeTotal > 0)
            @foreach($localeBreak as $loc => $count)
            @php $pct = round(($count / $localeTotal) * 100); @endphp
            <div style="margin-bottom:10px;">
                <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                    <span style="font-size:12.5px;color:#374151;">{{ strtoupper($loc) }} {{ $loc === 'id' ? '🇮🇩' : '🇺🇸' }}</span>
                    <span style="font-size:12.5px;font-weight:700;">{{ $count }} ({{ $pct }}%)</span>
                </div>
                <div style="height:5px;background:#f1f5f9;border-radius:3px;overflow:hidden;">
                    <div style="height:100%;width:{{ $pct }}%;background:{{ $loc === 'id' ? '#e67e22' : '#3b82f6' }};border-radius:3px;"></div>
                </div>
            </div>
            @endforeach
        @else
        <div style="color:#94a3b8;font-size:13px;">Belum ada data</div>
        @endif
    </div>

    {{-- Top Pages --}}
    <div class="card" style="padding:20px;">
        <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0 0 14px;">Halaman Terpopuler (Bulan Ini)</h3>
        @forelse($topPages as $pg)
        <div style="display:flex;align-items:center;justify-content:space-between;padding:8px 0;border-bottom:1px solid #f8fafc;">
            <span style="font-size:12.5px;color:#374151;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:70%;">{{ $pg->page ?: '/' }}</span>
            <span style="font-size:12px;font-weight:700;color:#0f172a;background:#f1f5f9;padding:2px 8px;border-radius:6px;flex-shrink:0;">{{ number_format($pg->total) }}</span>
        </div>
        @empty
        <div style="text-align:center;padding:24px 0;color:#94a3b8;font-size:13px;">Belum ada data</div>
        @endforelse
    </div>

</div>

{{-- ===== INFO BOX ===== --}}
<div style="background:#fffbf5;border:1px solid #fed7aa;border-radius:10px;padding:14px 16px;font-size:12.5px;color:#9a3412;">
    💡 <strong>Data dikumpulkan secara internal</strong> — tidak memerlukan Google Analytics.
    Klik WA, Telepon, Buat Janji dll dicatat otomatis dari tombol-tombol di frontend.
    Data mulai terkumpul sejak fitur ini diaktifkan.
</div>

@endsection

@push('scripts')
<script>
const viewsData  = @json($viewsChart);
const clicksData = @json($clicksChart);

// Views Chart
new Chart(document.getElementById('viewsChart'), {
    type: 'line',
    data: {
        labels: viewsData.map(d => d.date),
        datasets: [
            {
                label: 'Total Kunjungan',
                data: viewsData.map(d => d.total),
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59,130,246,0.08)',
                fill: true,
                tension: 0.4,
                pointRadius: 2,
                borderWidth: 2,
            },
            {
                label: 'Unik',
                data: viewsData.map(d => d.unique),
                borderColor: '#8b5cf6',
                backgroundColor: 'transparent',
                fill: false,
                tension: 0.4,
                pointRadius: 2,
                borderWidth: 2,
                borderDash: [4,3],
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top', labels: { font: { size: 11 }, boxWidth: 12 } } },
        scales: {
            x: { ticks: { font: { size: 10 }, maxTicksLimit: 10 }, grid: { display: false } },
            y: { ticks: { font: { size: 10 } }, beginAtZero: true }
        }
    }
});

// Clicks Chart
new Chart(document.getElementById('clicksChart'), {
    type: 'bar',
    data: {
        labels: clicksData.map(d => d.date),
        datasets: [{
            label: 'Klik',
            data: clicksData.map(d => d.total),
            backgroundColor: 'rgba(230,126,34,0.7)',
            borderColor: '#e67e22',
            borderWidth: 1,
            borderRadius: 4,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            x: { ticks: { font: { size: 10 }, maxTicksLimit: 10 }, grid: { display: false } },
            y: { ticks: { font: { size: 10 } }, beginAtZero: true }
        }
    }
});
</script>
@endpush