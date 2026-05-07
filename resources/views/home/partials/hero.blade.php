{{-- HERO SECTION --}}
<section id="hero" class="relative pt-32 pb-20 hero-bg text-white overflow-hidden min-h-screen flex items-center">

    {{-- Animated Particles --}}
    <div class="hero-particles" id="hero-particles"></div>

    {{-- Decorative Rings --}}
    <div class="absolute top-20 right-10 w-80 h-80 rounded-full border border-white/5 anim-float delay-200"></div>
    <div class="absolute bottom-20 left-10 w-56 h-56 rounded-full border border-primary/10 anim-float delay-500"></div>
    <div class="absolute top-40 left-1/4 w-40 h-40 rounded-full bg-primary/5 blur-3xl"></div>
    <div class="absolute bottom-40 right-1/4 w-56 h-56 rounded-full bg-blue-500/5 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            {{-- LEFT: Hero Copy --}}
            <div class="anim-fade-left">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/15 rounded-full px-4 py-2 mb-6 anim-fade-up delay-100">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-sm font-medium text-gray-200">{{ __('frontend.hero_badge') }}</span>
                </div>

                <h1 class="hero-title text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-6 anim-fade-up delay-200">
                    Perbaikan
                    <span class="text-primary">&</span>
                    Perawatan Bodi Kendaraan
                    <span class="text-shimmer"> Standar Pabrik</span>
                </h1>

                <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed anim-fade-up delay-300">
                    Teknisi berpengalaman.<br>
                    Konsultasi Gratis.<br>
                    <span class="text-white font-semibold">Hasil akhir bergaransi.</span>
                </p>

                {{-- Stats Grid --}}
                <div class="grid grid-cols-2 gap-3 mb-10 max-w-md anim-fade-up delay-400">
                    <div class="stats-card rounded-xl p-4 text-center">
                        <div class="text-3xl font-extrabold text-primary">
                            <span data-counter data-target="2000" data-suffix="+">2K+</span>
                        </div>
                        <div class="text-xs text-gray-300 mt-1">{{ __('frontend.hero_stat_repairs') }}</div>
                    </div>
                    <div class="stats-card rounded-xl p-4 text-center">
                        <div class="text-2xl font-extrabold text-primary">6-24<span class="text-sm">Bln</span></div>
                        <div class="text-xs text-gray-300 mt-1">{{ __('frontend.hero_stat_warranty') }}</div>
                    </div>
                    <div class="stats-card rounded-xl p-4 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                            <span class="text-2xl font-extrabold text-primary">4.6</span>
                        </div>
                        <div class="text-xs text-gray-300 mt-1">{{ __('frontend.hero_stat_rating') }}</div>
                    </div>
                    <div class="stats-card rounded-xl p-4 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <i data-lucide="check" class="w-4 h-4 text-primary"></i>
                            <span class="text-2xl font-extrabold text-primary">
                                <span data-counter data-target="95" data-suffix="%">95%</span>
                            </span>
                        </div>
                        <div class="text-xs text-gray-300 mt-1">{{ __('frontend.hero_stat_happy') }}</div>
                    </div>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap gap-4 anim-fade-up delay-500">
                    <a href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6287853722011' }}?text=Halo%2C%20saya%20ingin%20buat%20janji%20perbaikan%20kendaraan"
                       target="_blank"
                       class="btn-lift inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white font-bold px-8 py-4 text-lg rounded-xl transition-colors">
                        {{ __('frontend.hero_cta_book') }}
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </a>
                    <a href="tel:+{{ $settings['contact_whatsapp'] ?? '6287853722011' }}"
                       class="phone-pulse btn-lift inline-flex items-center gap-2 bg-white text-navy hover:bg-gray-100 font-bold px-8 py-4 text-lg rounded-xl transition-colors">
                        <i data-lucide="phone" class="w-5 h-5 text-primary"></i>
                        Hubungi Kami
                    </a>
                </div>

                {{-- Trust Badges --}}
                <div class="flex flex-wrap gap-4 mt-8 anim-fade-up delay-600">
                    <div class="flex items-center gap-2 text-gray-400 text-sm">
                        <i data-lucide="shield-check" class="w-4 h-4 text-green-400"></i>
                        <span>{{ __('frontend.hero_trust_warranty') }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-400 text-sm">
                        <i data-lucide="award" class="w-4 h-4 text-yellow-400"></i>
                        <span>{{ __('frontend.hero_trust_paint') }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-400 text-sm">
                        <i data-lucide="clock" class="w-4 h-4 text-blue-400"></i>
                        <span>{{ __('frontend.hero_trust_tracking') }}</span>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Tracking Card --}}
            <div id="tracking" class="anim-fade-right delay-300">
                <div class="tracking-card p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="car" class="w-6 h-6 text-primary"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">{{ __('frontend.track_title') }}</h3>
                            <p class="text-sm text-gray-500">{{ __('frontend.track_subtitle') }}</p>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6">{{ __('frontend.track_desc') }}</p>

                    <form id="tracking-form" class="space-y-4" onsubmit="handleTracking(event)">
                        <div class="relative">
                            <input type="text"
                                   id="booking-id"
                                   placeholder="{{ __('frontend.track_placeholder') }}"
                                   class="w-full h-14 px-4 pr-12 text-base border-2 border-gray-200 focus:border-primary rounded-xl outline-none transition-colors bg-white">
                            <i data-lucide="search" class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        </div>
                        <button type="submit"
                                class="btn-lift w-full h-14 bg-primary hover:bg-primary-dark text-white font-bold text-lg rounded-xl transition-colors flex items-center justify-center gap-2">
                            <i data-lucide="search" class="w-5 h-5"></i>
                            {{ __('frontend.track_btn') }}
                        </button>
                    </form>

                    {{-- Tracking Result Placeholder --}}
                    <div id="tracking-result" class="hidden mt-4 p-4 bg-gray-50 rounded-xl"></div>

                    {{-- Quick Info --}}
                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <p class="text-xs text-gray-400 text-center mb-3">{{ __('frontend.track_help') }}</p>
                        <a href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6287853722011' }}" target="_blank"
                           class="w-full flex items-center justify-center gap-2 text-green-600 font-semibold hover:text-green-700 transition-colors text-sm">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            {{ __('frontend.track_wa') }}
                        </a>
                    </div>
                </div>

                {{-- Scroll Indicator --}}
                <div class="scroll-indicator flex justify-center mt-8">
                    <a href="#reviews" data-scroll-to="#reviews" class="flex flex-col items-center gap-2 text-gray-400 hover:text-gray-200 transition-colors cursor-pointer">
                        <span class="text-xs">{{ __('frontend.hero_scroll') }}</span>
                        <i data-lucide="chevrons-down" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
// ===== HERO PARTICLES =====
(function() {
    const container = document.getElementById('hero-particles');
    for (let i = 0; i < 20; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        p.style.left   = Math.random() * 100 + '%';
        p.style.width  = (Math.random() * 6 + 3) + 'px';
        p.style.height = p.style.width;
        p.style.animationDuration  = (Math.random() * 15 + 10) + 's';
        p.style.animationDelay     = (Math.random() * 10) + 's';
        p.style.opacity = Math.random() * 0.5 + 0.1;
        container.appendChild(p);
    }
})();

// ===== TRACKING FORM =====
function handleTracking(e) {
    e.preventDefault();
    const id = document.getElementById('booking-id').value.trim();
    const result = document.getElementById('tracking-result');
    if (!id) return;

    result.innerHTML = `
        <div class="flex items-center gap-3 mb-3">
            <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
            <span class="font-semibold text-gray-700">ID: ${id}</span>
        </div>
        <p class="text-sm text-gray-500">Silakan hubungi kami via WhatsApp untuk informasi status terkini.</p>
        <a href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6287853722011' }}?text=Halo%2C%20saya%20ingin%20cek%20status%20booking%20dengan%20ID:%20${encodeURIComponent(id)}"
           target="_blank"
           class="mt-3 inline-flex items-center gap-2 text-green-600 font-semibold text-sm hover:underline">
            Cek via WhatsApp →
        </a>
    `;
    result.classList.remove('hidden');
    lucide.createIcons();
}
</script>
@endpush
