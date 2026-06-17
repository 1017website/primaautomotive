@php $locale = app()->getLocale(); @endphp
<nav id="navbar" class="fixed top-0 left-0 right-0 z-40 transition-all duration-300">
    <div class="pa-container">
        <div class="h-[76px] lg:h-[84px] flex items-center justify-between gap-5">
            <a href="#hero" data-scroll-to="#hero" class="group flex items-center gap-3 min-w-0">
                @php $logo = \App\Models\SiteSetting::get('site_logo'); @endphp
                @if($logo)
                <span class="relative inline-flex items-center">
                    <span class="absolute -left-3 top-1/2 h-9 w-1 -translate-y-1/2 bg-orange-500 group-hover:h-11 transition-all"></span>
                    <span class="bg-white px-4 py-2 border border-zinc-200 shadow-sm">
                        <img src="{{ $logo }}" alt="{{ \App\Models\SiteSetting::get('site_name','Prima Automotive') }}" class="h-9 lg:h-10 w-auto object-contain">
                    </span>
                </span>
                @else
                <span class="relative w-11 h-11 bg-zinc-950 text-white flex items-center justify-center overflow-hidden">
                    <span class="absolute -right-3 inset-y-0 w-5 bg-orange-500 skew-x-[-16deg]"></span>
                    <i data-lucide="car-front" class="relative w-5 h-5"></i>
                </span>
                <span class="leading-none">
                    <span class="block font-black text-zinc-950 text-base uppercase tracking-[-.04em]">Prima</span>
                    <span class="block font-black text-orange-600 text-[10px] tracking-[.24em] uppercase mt-1">Automotive</span>
                </span>
                @endif
            </a>

            <div class="hidden lg:flex flex-1 items-center justify-center">
                <div class="inline-flex items-center gap-8">
                    @foreach([
                        ['#hero', 'nav_home'],
                        ['#tracking', 'nav_track'],
                        ['#services', 'nav_services'],
                        ['#about', 'nav_about'],
                        ['#location', 'nav_location'],
                        ['#contact', 'nav_contact'],
                    ] as [$href, $key])
                    <a href="{{ $href }}" data-scroll-to="{{ $href }}"
                       class="relative text-[11px] font-black uppercase tracking-[.18em] text-zinc-500 hover:text-zinc-950 transition-colors cursor-pointer py-3 group/nav">
                        <span>{{ __('frontend.' . $key) }}</span>
                        <span class="absolute left-0 right-0 bottom-1 h-[2px] bg-orange-500 scale-x-0 origin-left group-hover/nav:scale-x-100 transition-transform duration-300"></span>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="hidden md:flex items-center gap-3">
                <div class="flex items-center border border-zinc-200 bg-white/75 backdrop-blur-xl">
                    <a href="{{ route('lang.switch', 'id') }}"
                       class="px-3.5 py-2 text-[11px] font-black uppercase tracking-wider transition-all {{ $locale === 'id' ? 'bg-zinc-950 text-white' : 'text-zinc-500 hover:text-zinc-950' }}">
                        ID
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}"
                       class="px-3.5 py-2 text-[11px] font-black uppercase tracking-wider transition-all {{ $locale === 'en' ? 'bg-zinc-950 text-white' : 'text-zinc-500 hover:text-zinc-950' }}">
                        EN
                    </a>
                </div>

                <a href="{{ route('booking') }}"
                   class="pa-btn-primary inline-flex items-center gap-2 font-black px-5 py-3 text-[11px] uppercase tracking-[.16em]">
                    {{ __('frontend.nav_book') }}
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </a>
            </div>

            <button id="mobile-menu-btn" class="md:hidden w-12 h-12 bg-zinc-950 text-white flex items-center justify-center" aria-label="Open menu">
                <span class="sr-only">Open menu</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="7" x2="20" y2="7"/><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="17" x2="20" y2="17"/></svg>
            </button>
        </div>
    </div>
</nav>
