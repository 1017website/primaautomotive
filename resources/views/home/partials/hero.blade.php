{{-- HERO SECTION - Clean white orange with subtle accents --}}
@php
    $heroTitle    = $settings['hero_title'] ?? 'Perbaikan & Perawatan Bodi Kendaraan Standar Pabrik';
    $heroSubtitle = $settings['hero_subtitle'] ?? "Teknisi berpengalaman.\nKonsultasi Gratis.\nHasil akhir standar pabrik yang bergaransi.";
    $wa           = $settings['contact_whatsapp'] ?? '6287853722011';
    $phone        = $settings['contact_phone'] ?? '0878-5372-2011';
    $rating       = $settings['hero_stat_rating'] ?? ($settings['reviews_total_rating'] ?? '4.6');
    $repairs      = $settings['hero_stat_repairs'] ?? '2000';
    $happy        = $settings['hero_stat_happy'] ?? '95';
    $warranty     = $settings['hero_stat_warranty'] ?? '6-24';
    // Temporary Unsplash image for preview. Replace later with CMS upload if needed.
    $heroImage    = 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1600&q=85';
@endphp

<section id="hero" class="relative min-h-screen pt-28 lg:pt-32 pb-12 lg:pb-16 flex items-center overflow-hidden">
    <div class="pa-subtle-mark right-[-4rem] top-32 hidden lg:block"></div>
    <div class="absolute left-0 bottom-0 w-full h-28 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>

    <div class="pa-container relative w-full">
        <div class="grid lg:grid-cols-[.90fr_1.10fr] gap-8 lg:gap-14 items-center">
            <div class="relative z-10 anim-fade-left py-4 lg:py-10">
                <div class="flex flex-wrap items-center gap-4 mb-7">
                    <span class="pa-kicker">Prima Automotive</span>
                    <span class="text-[11px] font-black uppercase tracking-[.22em] text-zinc-500">Surabaya / Body Repair / Paint</span>
                </div>

                <h1 class="hero-title pa-title pa-reveal-line text-[3.55rem] md:text-[5.2rem] xl:text-[6.35rem] font-black leading-[.88] max-w-5xl mb-7">
                    {{ $heroTitle }}<span>.</span>
                </h1>

                <div class="max-w-xl border-l-2 border-orange-500 pl-5 mb-8 anim-fade-up delay-200">
                    <p class="text-lg md:text-xl text-zinc-600 leading-relaxed">
                        {!! nl2br(e($heroSubtitle)) !!}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mb-10 anim-fade-up delay-300">
                    <a href="https://wa.me/{{ $wa }}?text={{ urlencode('Halo Prima Automotive, saya ingin konsultasi mengenai perbaikan kendaraan.') }}"
                       target="_blank" class="pa-btn-primary inline-flex items-center justify-between gap-4 font-black px-6 py-4 text-xs uppercase tracking-[.18em] min-w-[230px]">
                        <span>{{ __('frontend.hero_cta_consult') }}</span>
                        <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                    </a>
                    <a href="{{ route('booking') }}" class="pa-btn-outline inline-flex items-center justify-between gap-4 font-black px-6 py-4 text-xs uppercase tracking-[.18em] min-w-[230px]">
                        <span>{{ __('frontend.hero_cta_booking') }}</span>
                        <i data-lucide="calendar-check" class="w-5 h-5 text-orange-500"></i>
                    </a>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 border-y border-zinc-200 divide-x divide-zinc-200 max-w-3xl anim-fade-up delay-400 bg-white/100 backdrop-blur-sm">
                    @foreach([
                        ['value' => $rating, 'label' => 'Rating Google', 'suffix' => '/5'],
                        ['value' => $repairs, 'label' => 'Unit Dikerjakan', 'suffix' => '+'],
                        ['value' => $happy, 'label' => 'Pelanggan Puas', 'suffix' => '%'],
                        ['value' => $warranty, 'label' => 'Bulan Garansi', 'suffix' => ''],
                    ] as $stat)
                    <div class="p-4 md:p-5">
                        <div class="text-3xl md:text-4xl font-black text-zinc-950 leading-none tracking-[-.06em]">{{ $stat['value'] }}<span class="text-orange-500">{{ $stat['suffix'] }}</span></div>
                        <div class="mt-2 text-[10px] font-black uppercase tracking-[.16em] text-zinc-500 leading-tight">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="relative anim-fade-right delay-200">
                <div class="absolute -left-5 top-8 bottom-8 w-[3px] bg-orange-500 hidden lg:block"></div>
                <div class="pa-hero-media relative min-h-[500px] lg:min-h-[660px] overflow-hidden bg-zinc-950 shadow-2xl shadow-zinc-950/10" data-pa-tilt>
                    @if($heroImage)
                    <img src="{{ $heroImage }}" alt="Prima Automotive" class="pa-image-zoom absolute inset-0 w-full h-full object-cover opacity-100">
                    <div class="pa-image-shade"></div>
                    @else
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_68%_24%,rgba(255,107,0,.20),transparent_20rem),linear-gradient(135deg,#faf7f1_0%,#ffffff_28%,#111111_29%,#252525_100%)]"></div>
                    @endif

                    <div class="absolute inset-x-0 top-0 h-[2px] bg-orange-500 pa-scan"></div>
                    <div class="absolute left-5 top-5 lg:left-8 lg:top-8 right-5 flex items-start justify-between gap-4">
                        <div class="pa-media-panel px-5 py-4 max-w-[300px]">
                            <p class="text-[10px] font-black uppercase tracking-[.26em] text-orange-600">Paint Lab</p>
                            <p class="mt-2 text-zinc-950 font-black leading-tight">Color matching & final QC sebelum serah kendaraan.</p>
                        </div>
                        <div class="hidden sm:flex w-16 h-16 bg-white text-zinc-950 border border-white/60 items-center justify-center shadow-xl">
                            <i data-lucide="gauge" class="w-8 h-8 text-orange-500"></i>
                        </div>
                    </div>

                    <div class="absolute left-5 right-5 bottom-5 lg:left-8 lg:right-8 lg:bottom-8 grid sm:grid-cols-3 gap-2 lg:gap-3">
                        @foreach([
                            ['title'=>'Warranty', 'desc'=>'6-24 bulan'],
                            ['title'=>'Estimate', 'desc'=>'Transparan'],
                            ['title'=>'Finish', 'desc'=>'Standar pabrik'],
                        ] as $item)
                        <div class="pa-media-panel p-4">
                            <p class="text-[10px] font-black uppercase tracking-[.20em] text-zinc-500">{{ $item['title'] }}</p>
                            <p class="mt-2 font-black text-zinc-950">{{ $item['desc'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tracking" class="relative pb-14 lg:pb-20">
    <div class="pa-container">
        <div class="relative bg-white border border-zinc-200 overflow-hidden reveal shadow-xl shadow-zinc-950/5">
            <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-orange-500 via-orange-400 to-transparent"></div>
            <div class="absolute -right-20 -bottom-20 w-64 h-64 rounded-full bg-orange-500/10 blur-3xl"></div>
            <div class="relative grid lg:grid-cols-[.72fr_1.28fr] gap-6 lg:gap-10 items-center p-5 md:p-8 lg:p-10">
                <div>
                    <span class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600">{{ __('frontend.track_badge') }}</span>
                    <h2 class="mt-4 text-3xl md:text-5xl font-black uppercase tracking-[-.06em] leading-[.9] text-zinc-950">{{ __('frontend.track_title') }}</h2>
                    <p class="mt-4 text-zinc-600 leading-relaxed max-w-lg">{{ __('frontend.track_subtitle') }}</p>
                </div>

                <form id="tracking-form" class="relative grid sm:grid-cols-[1fr_auto] gap-3">
                    <div class="relative">
                        <i data-lucide="hash" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-orange-500"></i>
                        <input id="booking-id" type="text" placeholder="{{ __('frontend.track_placeholder') }}"
                               class="w-full h-16 border border-zinc-200 bg-[#fffaf4] pl-12 pr-4 outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/20 font-bold text-zinc-900 placeholder:text-zinc-400 transition-all">
                    </div>
                    <button type="submit" class="pa-btn-primary h-16 px-7 font-black inline-flex items-center justify-center gap-3 text-xs uppercase tracking-[.18em]">
                        <span>{{ __('frontend.track_button') }}</span>
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </button>
                    <div id="tracking-result" class="sm:col-span-2"></div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.getElementById('tracking-form')?.addEventListener('submit', function (e) {
    e.preventDefault();
    const input = document.getElementById('booking-id');
    const result = document.getElementById('tracking-result');
    const id = (input?.value || '').trim();

    if (!id) {
        result.className = 'mt-4 p-4 bg-orange-50 border border-orange-200 text-sm text-orange-700 font-bold';
        result.textContent = 'Masukkan ID booking terlebih dahulu.';
        return;
    }

    result.className = 'mt-4 p-4 bg-zinc-50 border border-zinc-200 text-sm text-zinc-700 flex items-center gap-3';
    result.innerHTML = '<span class="w-5 h-5 rounded-full border-2 border-zinc-300 border-t-orange-500 animate-spin inline-block"></span><span class="font-bold">Mengecek status booking...</span>';

    fetch('/track', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ booking_code: id })
    })
    .then(async response => {
        const data = await response.json().catch(() => ({}));
        if (!response.ok) throw data;
        return data;
    })
    .then(data => {
        result.className = 'mt-4 p-4 bg-white border border-zinc-200 text-sm text-zinc-700';
        result.innerHTML = `
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-green-100 flex items-center justify-center text-green-700"><i data-lucide="check-circle" class="w-5 h-5"></i></div>
                <div>
                    <p class="font-black text-zinc-950">${data.status_label || 'Status ditemukan'}</p>
                    <p class="text-zinc-500 text-xs">ID: ${data.booking_code || id}</p>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-2 text-zinc-600">
                <p><span class="font-bold">Nama:</span> ${data.customer_name || '-'}</p>
                <p><span class="font-bold">Kendaraan:</span> ${data.vehicle || '-'}</p>
                <p class="sm:col-span-2"><span class="font-bold">Catatan:</span> ${data.progress_note || '-'}</p>
            </div>
        `;
        lucide.createIcons();
    })
    .catch(() => {
        result.className = 'mt-4 p-4 bg-white border border-zinc-200 text-sm';
        result.innerHTML = `
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-orange-100 flex items-center justify-center text-orange-600 shrink-0"><i data-lucide="message-circle" class="w-5 h-5"></i></div>
                <div>
                    <p class="font-black text-zinc-950">ID booking belum ditemukan</p>
                    <p class="text-zinc-500 mt-1">Silakan hubungi admin via WhatsApp untuk pengecekan manual.</p>
                    <a href="https://wa.me/{{ $wa }}?text=Halo%2C%20saya%20ingin%20cek%20status%20booking%20dengan%20ID:%20${encodeURIComponent(id)}" target="_blank" class="inline-flex items-center gap-2 mt-3 text-orange-600 font-black hover:underline">Cek via WhatsApp →</a>
                </div>
            </div>
        `;
        lucide.createIcons();
    });
});
</script>
@endpush
