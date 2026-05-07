{{-- ABOUT SECTION --}}
<section id="about" class="relative py-20 overflow-hidden bg-gray-50">

    <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-orange-50 blur-3xl opacity-70"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full bg-blue-50 blur-3xl opacity-70"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="about-card p-8 md:p-12 reveal">

            {{-- Header --}}
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-primary/10 text-primary font-semibold rounded-full text-sm mb-4">{{ __('frontend.about_badge') }}</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-navy">{{ __('frontend.about_title') }}</h2>
            </div>

            {{-- Story --}}
            <div class="space-y-5 text-gray-700 text-base leading-relaxed">
                <p>Didirikan pada Maret 2022, kami memulai langkah ini dengan janji yang kami pegang teguh hingga kini — membangun kepercayaan pelanggan dengan menghadirkan layanan yang berkualitas dan bisa diandalkan.</p>
                <p>Kami melihat peluang ini sebagai kesempatan untuk menghadirkan sesuatu yang berbeda, yaitu layanan perbaikan bodi kendaraan yang terjangkau, jujur, dan berkualitas tinggi.</p>
                <p>Setiap penawaran dan estimasi kami sampaikan secara terbuka dan lengkap sejak awal, tanpa ada biaya tersembunyi. Kami hanya menggunakan bahan sesuai spesifikasi pabrikan (OEM) yang terbukti tahan lama.</p>
                <p>Kami percaya kepercayaan bukan diberikan begitu saja, melainkan dibangun setiap hari melalui kerja yang konsisten, rapi, dan hasil yang terbukti.</p>
            </div>

            {{-- Visi & Misi --}}
            <div class="grid md:grid-cols-2 gap-8 mt-12 reveal" data-delay="200">
                <div class="bg-gradient-to-br from-navy to-navy-light rounded-2xl p-8 text-white">
                    <div class="flex items-center gap-3 mb-4">
                        <i data-lucide="award" class="w-8 h-8 text-primary"></i>
                        <h3 class="text-xl font-bold">{{ __('frontend.about_vision_title') }}</h3>
                    </div>
                    <p class="text-gray-300 leading-relaxed">Menjadi pilihan utama yang menetapkan standar unggul melalui kualitas, inovasi, dan kepuasan pelanggan.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-md border border-gray-100">
                    <div class="flex items-center gap-3 mb-4">
                        <i data-lucide="users" class="w-8 h-8 text-primary"></i>
                        <h3 class="text-xl font-bold text-gray-800">{{ __('frontend.about_mission_title') }}</h3>
                    </div>
                    <ul class="space-y-2 text-gray-700">
                        @php
                        $missions = [
                            'Memulihkan kondisi kendaraan sebaik mungkin dengan kehati-hatian.',
                            'Meningkatkan kompetensi teknisi lewat metode terkini.',
                            'Memupuk kepercayaan pelanggan sehingga menjadi pilihan utama.',
                            'Mengutamakan kualitas, presisi, dan konsistensi.',
                        ];
                        @endphp
                        @foreach ($missions as $m)
                        <li class="flex items-start gap-2">
                            <i data-lucide="circle-check-big" class="w-5 h-5 text-primary mt-0.5 flex-shrink-0"></i>
                            <span class="text-sm">{{ $m }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- {{ __('frontend.about_jatidiri') }} --}}
            <div class="mt-12 reveal" data-delay="300">
                <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">{{ __('frontend.about_jatidiri') }}</h3>
                <div class="flex gap-3 justify-center">
                    {{-- JATI --}}
                    <div class="jatidiri-card flex-1 max-w-[180px] bg-gradient-to-br from-navy to-navy-light rounded-2xl p-4">
                        <div class="text-center mb-3">
                            <span class="text-2xl font-black text-primary tracking-widest">JATI</span>
                        </div>
                        <div class="space-y-2">
                            @foreach (__('frontend.jati_letters') as [$letter, $word])
                            <div class="flex items-center gap-2 bg-white/10 rounded-lg p-2">
                                <div class="w-7 h-7 bg-primary rounded-lg flex items-center justify-center text-white font-bold text-sm flex-shrink-0">{{ $letter }}</div>
                                <span class="font-medium text-white text-sm">{{ $word }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- DIRI --}}
                    <div class="jatidiri-card flex-1 max-w-[180px] bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-4">
                        <div class="text-center mb-3">
                            <span class="text-2xl font-black text-white tracking-widest">DIRI</span>
                        </div>
                        <div class="space-y-2">
                            @foreach (__('frontend.diri_letters') as [$letter, $word])
                            <div class="flex items-center gap-2 bg-white/20 rounded-lg p-2">
                                <div class="w-7 h-7 bg-navy rounded-lg flex items-center justify-center text-white font-bold text-sm flex-shrink-0">{{ $letter }}</div>
                                <span class="font-medium text-white text-sm">{{ $word }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Motto --}}
            <div class="mt-12 text-center p-8 bg-gradient-to-r from-navy to-navy-light rounded-2xl reveal" data-delay="400">
                <h3 class="text-lg font-bold text-white mb-4">{{ __('frontend.about_motto_title') }}</h3>
                <p class="text-2xl md:text-3xl font-bold text-primary leading-snug">{{ $settings['about_motto'] ?? __('frontend.about_motto_title') }}</p>
                <p class="mt-4 text-gray-300 italic">Presisi, Rapi, Terbukti</p>
                <p class="mt-2 text-primary font-bold">#PastiGlowing</p>
            </div>

            {{-- Value Cards --}}
            <div class="grid md:grid-cols-3 gap-6 mt-12 reveal" data-delay="500">
                @php
                $values = [
                    ['icon' => 'shield',  'title' => 'Garansi 6-24 Bulan',      'desc' => 'Garansi meliputi cat pudar, cat terkelupas, dan cat tidak kilap.'],
                    ['icon' => 'award',   'title' => 'Autoglow & Glasurit',      'desc' => 'Cat berstandar pabrikan yang telah dipercaya industri refinish.'],
                    ['icon' => 'users',   'title' => 'Teknisi Profesional',      'desc' => 'Pengalaman lebih dari 10 tahun di industri perbaikan body kendaraan.'],
                ];
                @endphp
                @foreach ($values as $val)
                <div class="value-card text-center p-6 bg-gray-50 rounded-2xl">
                    <div class="value-icon w-14 h-14 mx-auto mb-4 bg-primary/10 rounded-xl flex items-center justify-center transition-all">
                        <i data-lucide="{{ $val['icon'] }}" class="w-7 h-7 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">{{ $val['title'] }}</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $val['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
