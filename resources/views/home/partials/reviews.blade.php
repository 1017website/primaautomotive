{{-- REVIEWS SECTION --}}
<section id="reviews" class="relative py-20 bg-gray-50 overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary/40 to-transparent"></div>
    <div class="absolute top-20 right-20 w-64 h-64 rounded-full bg-orange-50 blur-3xl opacity-60"></div>
    <div class="absolute bottom-20 left-20 w-48 h-48 rounded-full bg-blue-50 blur-3xl opacity-60"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
            <span class="inline-block px-4 py-2 bg-[#e67e22]/10 text-[#e67e22] font-semibold rounded-full text-sm mb-4">Ulasan Google</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0a1628]">Apa Kata Pelanggan Kami</h2>
            <div class="flex flex-wrap items-center justify-center gap-6 mt-6">
                <div class="flex items-center gap-2">
                    <div class="flex">
                        @for($i = 0; $i < 5; $i++)
                        <i data-lucide="star" class="w-6 h-6 fill-yellow-400 text-yellow-400"></i>
                        @endfor
                    </div>
                    <span class="text-2xl font-bold text-[#0a1628]">{{ $settings['reviews_total_rating'] ?? '4.6' }}</span>
                    <span class="text-gray-500">dari {{ $settings['reviews_total_count'] ?? '45' }} ulasan</span>
                </div>
                <div class="hidden md:block w-px h-8 bg-gray-300"></div>
                <div class="flex items-center gap-3 bg-white px-6 py-3 rounded-full shadow-md">
                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                        <i data-lucide="check" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-left">
                        <div class="text-2xl font-bold text-[#0a1628]">{{ $settings['reviews_happy_percent'] ?? '95' }}%</div>
                        <div class="text-sm text-gray-500">Pelanggan Puas</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($reviews as $i => $review)
            <div class="review-card bg-white rounded-2xl shadow-lg p-6 reveal" data-delay="{{ $i * 150 }}">
                <div class="flex gap-1 mb-4">
                    @for($s = 0; $s < $review->stars; $s++)
                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                    @endfor
                </div>
                <div class="text-4xl text-[#e67e22]/20 font-serif leading-none mb-2">"</div>
                <p class="text-gray-700 mb-6 text-base leading-relaxed italic">{{ $review->content }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br {{ $review->avatar_color }} rounded-full flex items-center justify-center text-white font-bold text-sm">
                            {{ $review->initials }}
                        </div>
                        <span class="font-semibold text-gray-800">{{ $review->name }}</span>
                    </div>
                    <span class="text-sm text-gray-400">{{ $review->time_ago }}</span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10 reveal">
            <a href="{{ $settings['reviews_google_url'] ?? '#' }}" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-2 text-[#e67e22] font-bold hover:underline transition-all group">
                Lihat semua ulasan di Google
                <i data-lucide="chevron-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>
