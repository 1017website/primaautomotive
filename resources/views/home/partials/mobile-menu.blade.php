{{-- Mobile Menu Overlay --}}
<div id="mobile-menu" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm md:hidden">
    <div class="absolute right-0 top-0 bottom-0 w-72 bg-white shadow-2xl flex flex-col">

        {{-- Header --}}
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-br from-primary to-primary-dark rounded-lg flex items-center justify-center">
                    <i data-lucide="car" class="w-4 h-4 text-white"></i>
                </div>
                <span class="font-black text-navy">Prima Automotive</span>
            </div>
            <button id="mobile-menu-close" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <i data-lucide="x" class="w-5 h-5 text-gray-600"></i>
            </button>
        </div>

        {{-- Nav Links --}}
        <nav class="flex-1 p-6 space-y-1">
            <a href="#hero"     data-scroll-to="#hero"     class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-orange-50 hover:text-primary text-gray-700 font-semibold transition-colors cursor-pointer">
                <i data-lucide="home" class="w-5 h-5"></i> Beranda
            </a>
            <a href="#tracking" data-scroll-to="#tracking" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-orange-50 hover:text-primary text-gray-700 font-semibold transition-colors cursor-pointer">
                <i data-lucide="search" class="w-5 h-5"></i> Lacak Kendaraan
            </a>
            <a href="#services" data-scroll-to="#services" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-orange-50 hover:text-primary text-gray-700 font-semibold transition-colors cursor-pointer">
                <i data-lucide="wrench" class="w-5 h-5"></i> Layanan
            </a>
            <a href="#about"    data-scroll-to="#about"    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-orange-50 hover:text-primary text-gray-700 font-semibold transition-colors cursor-pointer">
                <i data-lucide="info" class="w-5 h-5"></i> Tentang Kami
            </a>
            <a href="#location" data-scroll-to="#location" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-orange-50 hover:text-primary text-gray-700 font-semibold transition-colors cursor-pointer">
                <i data-lucide="map-pin" class="w-5 h-5"></i> Lokasi
            </a>
            <a href="#contact"  data-scroll-to="#contact"  class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-orange-50 hover:text-primary text-gray-700 font-semibold transition-colors cursor-pointer">
                <i data-lucide="mail" class="w-5 h-5"></i> Hubungi Kami
            </a>
        </nav>

        {{-- CTA --}}
        <div class="p-6 border-t border-gray-100 space-y-3">
            <a href="https://wa.me/6287853722011?text=Halo%2C%20saya%20ingin%20buat%20janji%20perbaikan%20kendaraan"
               target="_blank"
               class="btn-lift w-full flex items-center justify-center gap-2 bg-primary hover:bg-primary-dark text-white font-bold px-6 py-3.5 rounded-xl transition-colors">
                <i data-lucide="calendar" class="w-5 h-5"></i> Buat Janji
            </a>
            <a href="tel:+6287853722011"
               class="w-full flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-navy font-bold px-6 py-3 rounded-xl transition-colors">
                <i data-lucide="phone" class="w-5 h-5"></i> 0878-5372-2011
            </a>
        </div>
    </div>
</div>
