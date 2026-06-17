{{-- SERVICES SECTION - Clean editorial with image accents --}}
@php
    // Temporary Unsplash images for service preview. Replace later with dynamic service images if needed.
    $serviceImages = [
        'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1200&q=82',
        'https://images.unsplash.com/photo-1503736334956-4c8f8e92946d?auto=format&fit=crop&w=1200&q=82',
        'https://images.unsplash.com/photo-1525609004556-c46c7d6cf023?auto=format&fit=crop&w=1200&q=82',
        'https://images.unsplash.com/photo-1542362567-b07e54358753?auto=format&fit=crop&w=1200&q=82',
        'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=1200&q=82',
    ];
@endphp
<section id="services" class="pa-section bg-white">
    <span class="pa-section-line"></span>
    <div class="pa-container relative">
        <div class="grid lg:grid-cols-[.72fr_1.28fr] gap-8 lg:gap-16 items-end mb-12 lg:mb-16">
            <div class="reveal-left">
                <span class="pa-kicker">{{ __('frontend.services_badge') }}</span>
                <h2 class="pa-title mt-5 text-5xl md:text-7xl font-black leading-[.86]">{{ __('frontend.services_title') }}<span>.</span></h2>
            </div>
            <div class="reveal-right" data-delay="100">
                <p class="text-zinc-600 text-lg md:text-xl leading-relaxed max-w-3xl">{{ __('frontend.services_subtitle') }}</p>
                <div class="mt-8 grid sm:grid-cols-3 border-y border-zinc-200 divide-y sm:divide-y-0 sm:divide-x divide-zinc-200 bg-[#fffaf4]">
                    @foreach([
                        ['title' => 'Cek Awal', 'desc' => 'Diagnosa visual dan estimasi'],
                        ['title' => 'Cat Presisi', 'desc' => 'Matching warna lebih rapi'],
                        ['title' => 'Final QC', 'desc' => 'Pengecekan sebelum serah'],
                    ] as $quick)
                    <div class="p-5 relative">
                        <span class="absolute left-5 top-0 w-9 h-[3px] bg-orange-500"></span>
                        <p class="text-[10px] font-black uppercase tracking-[.22em] text-orange-600">{{ $quick['title'] }}</p>
                        <p class="mt-2 text-sm font-bold text-zinc-700 leading-relaxed">{{ $quick['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="pa-snap-row flex lg:grid lg:grid-cols-3 gap-5 lg:gap-6 overflow-x-auto lg:overflow-visible snap-x snap-mandatory pb-4 lg:pb-0">
            @forelse($services as $i => $service)
            @php $features = $service->getLocalFeatures($locale); @endphp
            <article class="service-card pa-model-card group relative min-w-[86%] sm:min-w-[420px] lg:min-w-0 snap-start bg-white border border-zinc-200 overflow-hidden pa-hover reveal {{ $i === 0 ? 'lg:col-span-2' : '' }}" data-delay="{{ $i * 90 }}" data-pa-tilt>
                <div class="relative h-64 md:h-72 bg-zinc-950 overflow-hidden">
                    <img src="{{ $serviceImages[$i % count($serviceImages)] }}" alt="{{ $service->getLocalTitle($locale) }}" class="pa-image-zoom absolute inset-0 w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/80 via-zinc-950/20 to-transparent"></div>
                    <div class="absolute left-5 top-5 text-white/36 text-7xl font-black tracking-[-.08em]">0{{ $loop->iteration }}</div>
                    <div class="absolute right-5 top-5 w-12 h-12 bg-white/95 border border-white/60 flex items-center justify-center text-orange-600 shadow-lg">
                        <i data-lucide="{{ $service->icon ?: 'wrench' }}" class="w-6 h-6"></i>
                    </div>
                    <div class="absolute left-5 right-5 bottom-5 flex items-center gap-3">
                        <span class="pa-accent-line"></span>
                        <span class="text-[10px] font-black uppercase tracking-[.22em] text-white/105">Premium Care</span>
                    </div>
                </div>

                <div class="p-6 md:p-8 bg-white min-h-[360px] flex flex-col">
                    <div class="flex items-center justify-between gap-4 mb-5">
                        @if($service->getLocalBadge($locale))
                        <span class="text-[10px] font-black uppercase tracking-[.22em] text-orange-600">{{ $service->getLocalBadge($locale) }}</span>
                        @else
                        <span class="text-[10px] font-black uppercase tracking-[.22em] text-orange-600">Service</span>
                        @endif
                        <span class="h-[1px] flex-1 bg-zinc-200"></span>
                    </div>

                    <h3 class="text-3xl md:text-4xl font-black uppercase tracking-[-.06em] text-zinc-950 leading-[.9] mb-4">{{ $service->getLocalTitle($locale) }}</h3>
                    <p class="text-zinc-600 text-sm md:text-base leading-relaxed mb-6">{{ $service->getLocalDescription($locale) }}</p>

                    @if(count($features) > 0)
                    <div class="grid gap-3 mb-6">
                        @foreach(array_slice($features, 0, 4) as $feature)
                        <div class="flex items-start gap-3 text-sm text-zinc-600">
                            <span class="mt-2 w-7 h-[2px] bg-orange-500 shrink-0"></span>
                            <span>{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>

                    @if(count($features) > 4)
                    <div class="service-details grid gap-3 mb-6">
                        @foreach(array_slice($features, 4) as $feature)
                        <div class="flex items-start gap-3 text-sm text-zinc-600">
                            <span class="mt-2 w-7 h-[2px] bg-orange-500 shrink-0"></span>
                            <span>{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                    <button onclick="toggleServiceDetail(this)" class="mt-auto inline-flex items-center justify-between gap-4 text-zinc-950 font-black hover:text-orange-600 transition-colors text-xs uppercase tracking-[.18em] group/button border-t border-zinc-200 pt-5">
                        <span>{{ __('frontend.services_detail') }}</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover/button:translate-x-1"></i>
                    </button>
                    @endif
                    @endif
                </div>
            </article>
            @empty
            <div class="lg:col-span-3 pa-panel-solid p-10 text-center">
                <p class="font-bold text-zinc-500">Belum ada data layanan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-10 reveal">
            <div class="relative overflow-hidden bg-white border border-zinc-200 p-7 md:p-10 lg:p-12 text-zinc-950 shadow-xl shadow-zinc-950/5">
                <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-orange-500 via-orange-400 to-transparent"></div>
                <div class="absolute -right-20 -bottom-20 w-64 h-64 rounded-full bg-orange-500/10 blur-3xl"></div>
                <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
                    <div>
                        <span class="text-orange-600 text-[11px] font-black uppercase tracking-[.24em]">Free Assessment</span>
                        <h3 class="mt-3 text-4xl md:text-6xl font-black uppercase tracking-[-.07em] leading-[.86]">{{ __('frontend.services_cta_title') }}</h3>
                        <p class="text-zinc-600 mt-4 max-w-2xl leading-relaxed">{{ __('frontend.services_cta_desc') }}</p>
                    </div>
                    <a href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6287853722011' }}?text={{ urlencode('Halo Prima Automotive, saya ingin konsultasi gratis mengenai perbaikan kendaraan.') }}"
                       target="_blank" class="shrink-0 pa-btn-primary inline-flex items-center justify-between gap-4 font-black px-6 py-4 min-w-[230px] text-xs uppercase tracking-[.18em]">
                        <span>{{ __('frontend.services_cta_btn') }}</span>
                        <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .service-card .service-details { max-height: 0; overflow: hidden; opacity: 0; transition: max-height .45s ease, opacity .45s ease; }
    .service-card.expanded .service-details { max-height: 360px; opacity: 1; }
</style>
@endpush

@push('scripts')
<script>
    function toggleServiceDetail(btn) {
        const card = btn.closest('.service-card');
        const isOpen = card.classList.contains('expanded');
        card.classList.toggle('expanded', !isOpen);
        btn.querySelector('span').textContent = isOpen ? '{{ __('frontend.services_detail') }}' : '{{ __('frontend.services_close') }}';
        lucide.createIcons();
    }
</script>
@endpush
