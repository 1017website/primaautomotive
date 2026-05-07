{{-- SERVICES SECTION --}}
<section id="services" class="relative py-20 bg-white overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#e67e22]/30 to-transparent"></div>
    <div class="absolute top-40 right-10 w-96 h-96 rounded-full bg-orange-50/60 blur-3xl"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 rounded-full bg-blue-50/60 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <span class="inline-block px-4 py-2 bg-[#e67e22]/10 text-[#e67e22] font-semibold rounded-full text-sm mb-4">{{ __('frontend.services_badge') }}</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0a1628]">{{ __('frontend.services_title') }}</h2>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            @foreach($services as $i => $service)
            <div class="service-card rounded-2xl border-0 shadow-xl overflow-hidden bg-white {{ $i % 2 === 0 ? 'reveal-left' : 'reveal-right' }}" data-delay="{{ $i * 150 }}">
                <div class="service-icon-bg h-64 bg-gradient-to-br {{ $service->gradient }} flex items-center justify-center relative overflow-hidden">
                    <div class="absolute w-40 h-40 rounded-full bg-white/10 top-4 right-4"></div>
                    <div class="absolute w-20 h-20 rounded-full bg-white/10 bottom-4 left-4"></div>
                    <i data-lucide="{{ $service->icon }}" class="w-20 h-20 text-white relative z-10 drop-shadow-lg"></i>
                    @if($service->getLocalBadge($locale))
                    <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1 text-white text-xs font-semibold">
                        {{ $service->getLocalBadge($locale) }}
                    </div>
                    @endif
                </div>
                <div class="p-8">
                    @if($service->getLocalBadge($locale))
                    <span class="inline-block px-3 py-1 bg-gray-100 text-gray-600 text-sm font-semibold rounded-full mb-3">{{ $service->getLocalBadge($locale) }}</span>
                    @endif
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $service->getLocalTitle($locale) }}</h3>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">{{ $service->getLocalDescription($locale) }}</p>
                    @php $features = $service->getLocalFeatures($locale); @endphp
                    @if(count($features) > 0)
                    <div class="service-details pt-4 border-t border-gray-100 mt-4">
                        <ul class="space-y-2 mb-4">
                            @foreach($features as $feature)
                            <li class="flex items-center gap-2 text-gray-700 text-sm">
                                <i data-lucide="circle-check-big" class="w-4 h-4 text-[#e67e22] flex-shrink-0"></i>
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <button onclick="toggleServiceDetail(this)"
                        class="mt-2 text-[#e67e22] font-semibold flex items-center gap-2 hover:gap-3 transition-all text-sm group">
                        <span>{{ __('frontend.services_detail') }}</span>
                        <i data-lucide="chevron-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                    </button>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12 reveal">
            <div class="bg-gradient-to-r from-[#0a1628] to-[#1e3a5f] rounded-2xl p-8 md:p-10 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-white mb-2">{{ __('frontend.services_cta_title') }}</h3>
                    <p class="text-gray-300">{{ __('frontend.services_cta_desc') }}</p>
                </div>
                <a href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6287853722011' }}?text={{ urlencode('Halo, saya ingin konsultasi gratis mengenai perbaikan kendaraan') }}"
                    target="_blank" class="btn-lift flex-shrink-0 inline-flex items-center gap-2 bg-[#e67e22] hover:bg-[#d35400] text-white font-bold px-8 py-4 rounded-xl transition-colors">
                    <i data-lucide="message-circle" class="w-5 h-5"></i> Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function toggleServiceDetail(btn) {
        const card = btn.closest('.service-card');
        const isOpen = card.classList.contains('expanded');
        card.classList.toggle('expanded', !isOpen);
        btn.querySelector('span').textContent = isOpen ? 'Lihat Detail' : 'Tutup';
        lucide.createIcons();
    }
</script>
@endpush