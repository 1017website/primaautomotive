{{-- PROCESS / ALUR KERJA SECTION --}}
<section class="relative py-20 bg-gradient-to-br from-navy to-navy-light text-white overflow-hidden">

    {{-- Decorative elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-40 h-40 rounded-full bg-white/3 blur-2xl"></div>
        <div class="absolute bottom-10 right-10 w-60 h-60 rounded-full bg-primary/10 blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-16 reveal">
            <span class="inline-block px-4 py-2 bg-white/10 text-primary font-semibold rounded-full text-sm mb-4">Cara Kerja</span>
            <h2 class="text-3xl md:text-4xl font-extrabold">Alur Kerja Kami</h2>
            <p class="text-gray-400 mt-3">Proses transparan dari konsultasi hingga kendaraan kembali ke tangan Anda</p>
        </div>

        {{-- Steps --}}
        <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-6">
            @php
            $steps = [
                ['num' => '01', 'title' => 'Konsultasi',  'desc' => 'Dapatkan estimasi biaya dan waktu perbaikan secara gratis',      'icon' => 'message-circle', 'delay' => 0],
                ['num' => '02', 'title' => 'Booking',     'desc' => 'Pilih jadwal yang sesuai dengan waktu luang Anda',               'icon' => 'calendar',       'delay' => 100],
                ['num' => '03', 'title' => 'Pengecekan',  'desc' => 'Dokumentasi kondisi awal kendaraan sebelum perbaikan',           'icon' => 'clipboard-check','delay' => 200],
                ['num' => '04', 'title' => 'Perbaikan',   'desc' => 'Proses pengerjaan oleh teknisi profesional berpengalaman',       'icon' => 'wrench',         'delay' => 300],
                ['num' => '05', 'title' => 'QC',          'desc' => 'Pemeriksaan kualitas menyeluruh sebelum diserahkan',             'icon' => 'shield-check',   'delay' => 400],
                ['num' => '06', 'title' => 'Selesai',     'desc' => 'Kendaraan siap diambil dengan garansi kepuasan penuh',           'icon' => 'check-circle',   'delay' => 500],
            ];
            @endphp

            @foreach ($steps as $step)
            <div class="process-step text-center reveal" data-delay="{{ $step['delay'] }}">
                {{-- Step Number --}}
                <div class="step-number w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-primary to-yellow-400 rounded-xl flex items-center justify-center text-xl font-extrabold shadow-lg text-white">
                    {{ $step['num'] }}
                </div>

                {{-- Icon --}}
                <div class="w-10 h-10 mx-auto mb-3 bg-white/10 rounded-lg flex items-center justify-center">
                    <i data-lucide="{{ $step['icon'] }}" class="w-5 h-5 text-primary"></i>
                </div>

                <h3 class="text-sm font-bold mb-1 text-white">{{ $step['title'] }}</h3>
                <p class="text-xs text-gray-400 leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Bottom CTA --}}
        <div class="text-center mt-14 reveal">
            <a href="https://wa.me/6287853722011?text=Halo%2C%20saya%20ingin%20mulai%20konsultasi%20dan%20booking%20perbaikan"
               target="_blank"
               class="btn-lift inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white font-bold px-10 py-4 rounded-xl text-lg transition-colors">
                <i data-lucide="calendar-plus" class="w-5 h-5"></i>
                Mulai Sekarang
            </a>
        </div>
    </div>
</section>
