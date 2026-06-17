{{-- ABOUT SECTION - Brand story editorial, clean orange accents --}}
@php
    $story = $settings['about_story'] ?? "Didirikan pada Maret 2022, kami memulai langkah ini dengan janji yang kami pegang teguh hingga kini — membangun kepercayaan pelanggan dengan menghadirkan layanan yang berkualitas dan bisa diandalkan.\n\nKami melihat peluang ini sebagai kesempatan untuk menghadirkan sesuatu yang berbeda, yaitu layanan perbaikan bodi kendaraan yang terjangkau, jujur, dan berkualitas tinggi.\n\nSetiap penawaran dan estimasi kami sampaikan secara terbuka dan lengkap sejak awal, tanpa ada biaya tersembunyi.";
    $missionsRaw = $settings['about_missions'] ?? "Memulihkan kondisi kendaraan sebaik mungkin dengan kehati-hatian.\nMeningkatkan kompetensi teknisi lewat metode terkini.\nMemupuk kepercayaan pelanggan sehingga menjadi pilihan utama.\nMengutamakan kualitas, presisi, dan konsistensi.";
    $missions = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $missionsRaw)));
    // Temporary Unsplash image for brand story preview.
    $aboutImage = 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1400&q=82';
@endphp
<section id="about" class="pa-section bg-[#fffaf4] overflow-hidden">
    <span class="pa-section-line"></span>
    <div class="pa-container relative">
        <div class="grid lg:grid-cols-[.95fr_1.05fr] gap-10 lg:gap-16 items-start">
            <div class="reveal-left lg:sticky lg:top-28">
                <span class="pa-kicker">{{ __('frontend.about_badge') }}</span>
                <h2 class="pa-title mt-5 text-5xl md:text-7xl font-black leading-[.86]">{{ __('frontend.about_title') }}<span>.</span></h2>
                <div class="mt-8 space-y-5 text-zinc-600 text-lg leading-relaxed max-w-2xl">
                    @foreach(array_filter(preg_split('/\r\n\r\n|\n\n|\r\r/', $story)) as $paragraph)
                    <p>{{ trim($paragraph) }}</p>
                    @endforeach
                </div>

                <div class="mt-9 grid sm:grid-cols-3 border-y border-zinc-200 divide-y sm:divide-y-0 sm:divide-x divide-zinc-200 bg-white/75">
                    @foreach([
                        ['title' => $settings['about_warranty'] ?? 'Garansi 6-24 Bulan', 'desc' => 'Garansi jelas untuk hasil pekerjaan.'],
                        ['title' => $settings['about_paint_brand'] ?? 'Autoglow & Glasurit', 'desc' => 'Material refinish pilihan.'],
                        ['title' => $settings['about_experience'] ?? 'Teknisi Profesional', 'desc' => 'Tim berpengalaman dan teliti.'],
                    ] as $val)
                    <div class="p-5 relative">
                        <span class="absolute left-5 top-0 w-9 h-[3px] bg-orange-500"></span>
                        <p class="text-[10px] font-black uppercase tracking-[.22em] text-orange-600">{{ $val['title'] }}</p>
                        <p class="mt-2 text-sm font-bold text-zinc-600 leading-relaxed">{{ $val['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="reveal-right" data-delay="150">
                <div class="bg-white border border-zinc-200 shadow-2xl shadow-zinc-950/10 overflow-hidden">
                    <div class="relative min-h-[390px] bg-zinc-950 text-white p-8 md:p-10 overflow-hidden flex items-end">
                        <img src="{{ $aboutImage }}" alt="Prima Automotive workshop" class="absolute inset-0 w-full h-full object-cover opacity-100" loading="lazy">
                        <div class="pa-image-shade"></div>
                        <div class="relative max-w-xl">
                            <p class="text-[11px] font-black text-orange-300 uppercase tracking-[.24em]">{{ __('frontend.about_motto_title') }}</p>
                            <h3 class="mt-5 text-4xl md:text-6xl font-black uppercase tracking-[-.07em] leading-[.86]">{{ $settings['about_motto'] ?? __('frontend.about_motto_title') }}</h3>
                            <p class="mt-5 text-white/76 text-lg italic">{{ $settings['about_tagline'] ?? 'Presisi, Rapi, Terbukti' }}</p>
                            <p class="mt-3 text-orange-300 font-black uppercase tracking-[.18em] text-xs">{{ $settings['about_hashtag'] ?? '#PastiGlowing' }}</p>
                        </div>
                    </div>

                    <div class="p-7 md:p-9 grid gap-7">
                        <div class="grid md:grid-cols-2 gap-5">
                            <div class="border border-zinc-200 p-6 bg-[#fffaf4] relative">
                                <span class="absolute left-6 top-0 w-10 h-[3px] bg-orange-500"></span>
                                <p class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600 mb-4">{{ __('frontend.about_vision_title') }}</p>
                                <p class="text-zinc-700 leading-relaxed">{{ $settings['about_vision'] ?? 'Menjadi pilihan utama yang menetapkan standar unggul melalui kualitas, inovasi, dan kepuasan pelanggan.' }}</p>
                            </div>
                            <div class="border border-zinc-200 p-6 bg-white relative">
                                <span class="absolute left-6 top-0 w-10 h-[3px] bg-orange-500"></span>
                                <p class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600 mb-4">{{ __('frontend.about_mission_title') }}</p>
                                <ul class="space-y-3">
                                    @foreach($missions as $m)
                                    <li class="flex items-start gap-3 text-sm text-zinc-700 leading-relaxed">
                                        <span class="mt-2 w-7 h-[2px] bg-orange-500 shrink-0"></span>
                                        <span>{{ $m }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-end justify-between gap-4 mb-5">
                                <h3 class="text-3xl font-black uppercase tracking-[-.06em] text-zinc-950">{{ __('frontend.about_jatidiri') }}</h3>
                                <span class="text-[11px] font-black uppercase tracking-[.22em] text-zinc-400">Brand Values</span>
                            </div>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div class="bg-white border border-zinc-200 p-6 relative overflow-hidden">
                                    <span class="absolute left-0 top-0 bottom-0 w-[3px] bg-orange-500"></span>
                                    <span class="relative text-3xl font-black tracking-[-.05em] text-zinc-950">JATI</span>
                                    <div class="relative grid grid-cols-2 gap-2 mt-5">
                                        @foreach (__('frontend.jati_letters') as [$letter, $word])
                                        <div class="border border-zinc-200 bg-[#fffaf4] p-3">
                                            <span class="block text-orange-600 font-black text-lg">{{ $letter }}</span>
                                            <span class="block font-bold text-[11px] text-zinc-600 mt-1">{{ $word }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="bg-white border border-zinc-200 p-6 relative overflow-hidden">
                                    <span class="absolute left-0 top-0 bottom-0 w-[3px] bg-orange-500"></span>
                                    <span class="relative text-3xl font-black tracking-[-.05em] text-zinc-950">DIRI</span>
                                    <div class="relative grid grid-cols-2 gap-2 mt-5">
                                        @foreach (__('frontend.diri_letters') as [$letter, $word])
                                        <div class="border border-zinc-200 bg-[#fffaf4] p-3">
                                            <span class="block text-orange-600 font-black text-lg">{{ $letter }}</span>
                                            <span class="block font-bold text-[11px] text-zinc-600 mt-1">{{ $word }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
