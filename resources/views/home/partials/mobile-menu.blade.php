@php $locale = app()->getLocale(); @endphp
<div id="mobile-menu" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm md:hidden">
    <div class="absolute right-0 top-0 bottom-0 w-72 bg-white shadow-2xl flex flex-col">

        <div class="flex items-center justify-between p-5 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-br from-[#e67e22] to-[#d35400] rounded-lg flex items-center justify-center">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
                </div>
                <span class="font-black text-[#0a1628]">Prima Automotive</span>
            </div>
            <button id="mobile-menu-close" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <nav class="flex-1 p-5 space-y-1 overflow-y-auto">
            @foreach([
                ['#hero',     'nav_home',     'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                ['#tracking', 'nav_track',    'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'],
                ['#services', 'nav_services', 'M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z'],
                ['#about',    'nav_about',    'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['#location', 'nav_location', 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z'],
                ['#contact',  'nav_contact',  'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ] as [$href, $key, $iconPath])
            <a href="{{ $href }}" data-scroll-to="{{ $href }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-orange-50 hover:text-[#e67e22] text-gray-700 font-semibold transition-colors cursor-pointer text-sm">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="{{ $iconPath }}"/></svg>
                {{ __('frontend.' . $key) }}
            </a>
            @endforeach
        </nav>

        <div class="p-5 border-t border-gray-100 space-y-3">
            {{-- Language switcher mobile --}}
            <div class="flex gap-2">
                <a href="{{ route('lang.switch', 'id') }}"
                   class="flex-1 text-center py-2 rounded-lg text-sm font-bold border transition-all {{ $locale === 'id' ? 'bg-[#e67e22] text-white border-[#e67e22]' : 'bg-white text-gray-500 border-gray-200' }}">
                    🇮🇩 Indonesia
                </a>
                <a href="{{ route('lang.switch', 'en') }}"
                   class="flex-1 text-center py-2 rounded-lg text-sm font-bold border transition-all {{ $locale === 'en' ? 'bg-[#e67e22] text-white border-[#e67e22]' : 'bg-white text-gray-500 border-gray-200' }}">
                    🇺🇸 English
                </a>
            </div>
            <a href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6287853722011' }}?text={{ urlencode('Halo, saya ingin buat janji perbaikan kendaraan') }}"
               target="_blank"
               class="w-full flex items-center justify-center gap-2 bg-[#e67e22] hover:bg-[#d35400] text-white font-bold px-6 py-3 rounded-xl transition-colors text-sm">
                {{ __('frontend.nav_book') }}
            </a>
        </div>
    </div>
</div>
