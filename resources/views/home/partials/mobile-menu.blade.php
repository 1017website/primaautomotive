@php $locale = app()->getLocale(); @endphp
<div id="mobile-menu" class="fixed inset-0 z-50 md:hidden bg-zinc-950/45 backdrop-blur-sm">
    <div class="ml-auto h-full w-[90%] max-w-sm bg-[#fffaf4] shadow-2xl flex flex-col border-l border-zinc-200">
        <div class="relative p-5 border-b border-zinc-200 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-orange-500 via-orange-400 to-transparent"></div>
            <div class="relative flex items-center justify-between gap-4">
                <div class="flex items-center gap-3 min-w-0">
                    @php $logo = \App\Models\SiteSetting::get('site_logo'); @endphp
                    @if($logo)
                        <div class="bg-white border border-zinc-200 px-3 py-2 shadow-sm"><img src="{{ $logo }}" alt="Prima Automotive" class="h-9 w-auto object-contain"></div>
                    @else
                        <div class="w-11 h-11 bg-white border border-zinc-200 text-orange-600 flex items-center justify-center"><i data-lucide="car-front" class="w-5 h-5"></i></div>
                        <div>
                            <p class="font-black text-zinc-950 leading-tight uppercase tracking-[-.04em]">Prima</p>
                            <p class="text-[10px] font-black text-orange-600 tracking-[.24em] uppercase">Automotive</p>
                        </div>
                    @endif
                </div>
                <button id="mobile-menu-close" class="relative w-11 h-11 bg-white border border-zinc-200 flex items-center justify-center text-zinc-950 hover:bg-zinc-950 hover:text-white transition-colors" aria-label="Close menu">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <a href="{{ route('booking') }}" class="relative mt-6 inline-flex w-full items-center justify-between gap-2 pa-btn-primary font-black px-5 py-4 text-xs uppercase tracking-[.18em]">
                <span>{{ __('frontend.nav_book') }}</span>
                <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
            </a>
        </div>

        <nav class="flex-1 p-5 overflow-y-auto">
            <div class="space-y-1">
                @foreach([
                    ['#hero',     'nav_home',     '01'],
                    ['#tracking', 'nav_track',    '02'],
                    ['#services', 'nav_services', '03'],
                    ['#about',    'nav_about',    '04'],
                    ['#location', 'nav_location', '05'],
                    ['#contact',  'nav_contact',  '06'],
                ] as [$href, $key, $number])
                <a href="{{ $href }}" data-scroll-to="{{ $href }}"
                   class="group flex items-center justify-between gap-4 px-1 py-4 border-b border-zinc-200 text-zinc-950 hover:text-orange-600 transition-all cursor-pointer">
                    <span class="font-black uppercase tracking-[-.04em] text-2xl">{{ __('frontend.' . $key) }}</span>
                    <span class="text-[11px] font-black text-zinc-400 group-hover:text-orange-600">{{ $number }}</span>
                </a>
                @endforeach
            </div>
        </nav>

        <div class="p-5 border-t border-zinc-200 bg-white/50">
            <p class="text-[10px] font-black uppercase tracking-[.24em] text-zinc-500 mb-3">Language</p>
            <div class="grid grid-cols-2 border border-zinc-200 bg-white">
                <a href="{{ route('lang.switch', 'id') }}"
                   class="text-center py-3 text-xs font-black uppercase tracking-wider transition-all {{ $locale === 'id' ? 'bg-zinc-950 text-white' : 'text-zinc-500' }}">
                    ID
                </a>
                <a href="{{ route('lang.switch', 'en') }}"
                   class="text-center py-3 text-xs font-black uppercase tracking-wider transition-all {{ $locale === 'en' ? 'bg-zinc-950 text-white' : 'text-zinc-500' }}">
                    EN
                </a>
            </div>
        </div>
    </div>
</div>
