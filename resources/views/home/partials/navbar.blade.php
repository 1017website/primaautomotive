@php $locale = app()->getLocale(); @endphp
<nav id="navbar" class="fixed top-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- Logo --}}
            <a href="#hero" data-scroll-to="#hero" class="flex items-center gap-2 h-full py-2">
                @php $logo = \App\Models\SiteSetting::get('site_logo'); @endphp
                @if($logo)
                <img src="{{ $logo }}" alt="{{ \App\Models\SiteSetting::get('site_name','Prima Automotive') }}" class="h-14 w-auto object-contain">
                @else
                <div class="w-10 h-10 bg-gradient-to-br from-[#e67e22] to-[#d35400] rounded-xl flex items-center justify-center">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
                </div>
                <div>
                    <div class="font-black text-[#0a1628] text-lg leading-tight">Prima</div>
                    <div class="font-bold text-[#e67e22] text-xs tracking-wider">AUTOMOTIVE</div>
                </div>
                @endif
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-7">
                <a href="#hero"     data-scroll-to="#hero"     class="text-gray-700 hover:text-[#e67e22] font-semibold transition-colors cursor-pointer text-sm">{{ __('frontend.nav_home') }}</a>
                <a href="#tracking" data-scroll-to="#tracking" class="text-gray-700 hover:text-[#e67e22] font-semibold transition-colors cursor-pointer text-sm">{{ __('frontend.nav_track') }}</a>
                <a href="#services" data-scroll-to="#services" class="text-gray-700 hover:text-[#e67e22] font-semibold transition-colors cursor-pointer text-sm">{{ __('frontend.nav_services') }}</a>
                <a href="#about"    data-scroll-to="#about"    class="text-gray-700 hover:text-[#e67e22] font-semibold transition-colors cursor-pointer text-sm">{{ __('frontend.nav_about') }}</a>
                <a href="#location" data-scroll-to="#location" class="text-gray-700 hover:text-[#e67e22] font-semibold transition-colors cursor-pointer text-sm">{{ __('frontend.nav_location') }}</a>
                <a href="#contact"  data-scroll-to="#contact"  class="text-gray-700 hover:text-[#e67e22] font-semibold transition-colors cursor-pointer text-sm">{{ __('frontend.nav_contact') }}</a>

                {{-- Language Switcher --}}
                <div class="flex items-center gap-1 bg-gray-100 rounded-lg p-1">
                    <a href="{{ route('lang.switch', 'id') }}"
                       class="px-2.5 py-1 rounded-md text-xs font-bold transition-all {{ $locale === 'id' ? 'bg-white text-[#e67e22] shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
                        ID
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}"
                       class="px-2.5 py-1 rounded-md text-xs font-bold transition-all {{ $locale === 'en' ? 'bg-white text-[#e67e22] shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
                        EN
                    </a>
                </div>

                <a href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6287853722011' }}?text={{ urlencode('Halo, saya ingin buat janji perbaikan kendaraan') }}"
                   target="_blank"
                   class="btn-lift inline-flex items-center gap-2 bg-[#e67e22] hover:bg-[#d35400] text-white font-bold px-5 py-2.5 rounded-lg text-sm transition-colors">
                    {{ __('frontend.nav_book') }}
                </a>
            </div>

            {{-- Hamburger --}}
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-700"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </button>
        </div>
    </div>
</nav>
