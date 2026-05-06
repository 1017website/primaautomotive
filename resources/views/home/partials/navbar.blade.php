<nav id="navbar" class="fixed top-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- Logo --}}
            <a href="#hero" data-scroll-to="#hero" class="flex items-center gap-3 h-full py-2">
                {{-- Ganti dengan <img> jika punya logo --}}
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-primary-dark rounded-xl flex items-center justify-center">
                        <i data-lucide="car" class="w-6 h-6 text-white"></i>
                    </div>
                    <div>
                        <div class="font-black text-navy text-lg leading-tight">Prima</div>
                        <div class="font-bold text-primary text-xs tracking-wider">AUTOMOTIVE</div>
                    </div>
                </div>
                {{-- Uncomment jika pakai logo image:
                <img src="{{ asset('images/logo.png') }}" alt="Prima Automotive" class="h-16 w-auto object-contain">
                --}}
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="#hero"     data-scroll-to="#hero"     class="text-gray-700 hover:text-primary font-semibold transition-colors cursor-pointer">Beranda</a>
                <a href="#tracking" data-scroll-to="#tracking" class="text-gray-700 hover:text-primary font-semibold transition-colors cursor-pointer">Lacak</a>
                <a href="#services" data-scroll-to="#services" class="text-gray-700 hover:text-primary font-semibold transition-colors cursor-pointer">Layanan</a>
                <a href="#about"    data-scroll-to="#about"    class="text-gray-700 hover:text-primary font-semibold transition-colors cursor-pointer">Tentang</a>
                <a href="#location" data-scroll-to="#location" class="text-gray-700 hover:text-primary font-semibold transition-colors cursor-pointer">Lokasi</a>
                <a href="#contact"  data-scroll-to="#contact"  class="text-gray-700 hover:text-primary font-semibold transition-colors cursor-pointer">Kontak</a>
                <a href="https://wa.me/6287853722011?text=Halo%2C%20saya%20ingin%20buat%20janji%20perbaikan%20kendaraan"
                   target="_blank"
                   class="btn-lift inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white font-bold px-6 py-2.5 rounded-lg text-sm transition-colors">
                    Buat Janji
                </a>
            </div>

            {{-- Hamburger --}}
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <i data-lucide="menu" class="w-6 h-6 text-gray-700"></i>
            </button>
        </div>
    </div>
</nav>
