{{-- REVIEWS SECTION - Clean premium trust --}}
<section class="pa-section bg-white">
    <span class="pa-section-line"></span>
    <div class="pa-container">
        <div class="grid lg:grid-cols-[.74fr_1.26fr] gap-10 lg:gap-16 items-start">
            <div class="lg:sticky lg:top-28 reveal-left">
                <span class="pa-kicker">{{ __('frontend.reviews_badge') }}</span>
                <h2 class="pa-title mt-5 text-5xl md:text-7xl font-black leading-[.86]">{{ __('frontend.reviews_title') }}<span>.</span></h2>
                <p class="mt-6 text-zinc-600 text-lg md:text-xl leading-relaxed">{{ __('frontend.reviews_subtitle') }}</p>

                <div class="mt-8 bg-white border border-zinc-200 p-7 md:p-8 relative overflow-hidden shadow-xl shadow-zinc-950/5">
                    <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-orange-500 via-orange-400 to-transparent"></div>
                    <div class="relative flex items-end justify-between gap-6">
                        <div>
                            <p class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600">Google Rating</p>
                            <div class="mt-4 text-7xl font-black tracking-[-.08em] text-zinc-950">{{ $settings['reviews_total_rating'] ?? '4.6' }}</div>
                        </div>
                        <div class="text-right">
                            <div class="flex gap-1 text-orange-500 mb-3 justify-end">
                                @for($i=0;$i<5;$i++)<i data-lucide="star" class="w-5 h-5 fill-orange-500"></i>@endfor
                            </div>
                            <p class="text-zinc-500 text-sm font-bold">Review asli dari pelanggan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                @foreach($reviews as $i => $review)
                <div class="bg-[#fffaf4] border border-zinc-200 p-6 md:p-7 pa-hover reveal" data-delay="{{ $i * 100 }}" data-pa-tilt>
                    <div class="flex items-center justify-between gap-4 mb-7">
                        <div class="flex gap-1 text-orange-500">
                            @for($j=0;$j<5;$j++)
                            <i data-lucide="star" class="w-4 h-4 fill-orange-500 text-orange-500"></i>
                            @endfor
                        </div>
                        <span class="text-[11px] font-black uppercase tracking-[.16em] text-zinc-400">{{ $review->time_ago }}</span>
                    </div>
                    <p class="text-zinc-700 leading-relaxed mb-8 text-base">“{{ $review->content }}”</p>
                    <div class="flex items-center gap-3 pt-5 border-t border-zinc-200">
                        <div class="w-12 h-12 bg-white border border-zinc-200 flex items-center justify-center text-orange-600 font-black text-sm">
                            {{ $review->initials }}
                        </div>
                        <div>
                            <span class="block font-black text-zinc-950 uppercase tracking-[-.03em]">{{ $review->name }}</span>
                            <span class="block text-[11px] font-black text-orange-600 uppercase tracking-[.16em]">Verified Customer</span>
                        </div>
                    </div>
                </div>
                @endforeach

                <a href="{{ $settings['reviews_google_url'] ?? '#' }}" target="_blank" rel="noopener noreferrer" class="group relative overflow-hidden bg-white border border-zinc-200 p-7 min-h-[250px] reveal pa-hover flex flex-col justify-between" data-delay="{{ count($reviews) * 100 }}">
                    <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-orange-500 via-orange-400 to-transparent"></div>
                    <div class="relative">
                        <p class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600 mb-4">Google Reviews</p>
                        <h3 class="text-4xl font-black uppercase tracking-[-.07em] leading-[.86] text-zinc-950">{{ __('frontend.reviews_more') }}</h3>
                        <p class="mt-4 text-zinc-500 text-sm leading-relaxed">Lihat feedback lain langsung dari halaman Google Review kami.</p>
                    </div>
                    <span class="relative inline-flex items-center justify-between gap-4 font-black text-xs uppercase tracking-[.18em] mt-8 border-t border-zinc-200 pt-5 text-orange-600">Discover <i data-lucide="arrow-up-right" class="w-5 h-5"></i></span>
                </a>
            </div>
        </div>
    </div>
</section>

@php $elfsightReviews = \App\Models\SiteScript::inline('elfsight_google_reviews'); @endphp
@if($elfsightReviews)
<section class="py-12 bg-[#fffaf4]">
    <div class="pa-container">
        {!! $elfsightReviews !!}
    </div>
</section>
@endif
