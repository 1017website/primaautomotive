{{-- LOCATION + CONTACT + FOOTER - Clean premium, orange as accent only --}}
@php
    $wa = $settings['contact_whatsapp'] ?? '6287853722011';
    $phone = $settings['contact_phone'] ?? '0878-5372-2011';
    $footerLogo = \App\Models\SiteSetting::get('site_logo_white');
    $siteName = \App\Models\SiteSetting::get('site_name', 'Prima Automotive');
@endphp

<section id="location" class="pa-section bg-white overflow-hidden">
    <span class="pa-section-line"></span>
    <div class="pa-container relative">
        <div class="grid lg:grid-cols-[.82fr_1.18fr] gap-7 lg:gap-10 items-stretch reveal">
            <div class="bg-[#fffaf4] border border-zinc-200 p-7 md:p-9 lg:p-10 relative overflow-hidden">
                <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-orange-500 via-orange-400 to-transparent"></div>
                <div class="relative">
                    <span class="pa-kicker">{{ __('frontend.location_badge') }}</span>
                    <h2 class="pa-title mt-5 text-5xl md:text-6xl font-black leading-[.86]">{{ __('frontend.location_title') }}<span>.</span></h2>
                </div>

                <div class="relative mt-9 grid gap-4">
                    <div class="bg-white border border-zinc-200 p-5">
                        <p class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600 mb-3">{{ __('frontend.location_address') }}</p>
                        <p class="text-zinc-800 font-bold">Jl. Manyar Kartika Barat No.9</p>
                        <p class="text-zinc-600">Menur Pumpungan, Kec. Sukolilo</p>
                        <p class="text-zinc-600">Surabaya, Jawa Timur 60118</p>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="bg-white border border-zinc-200 p-5">
                            <p class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600 mb-3">{{ __('frontend.location_hours') }}</p>
                            <p class="text-zinc-600">Senin - Jumat: 08.00 - 18.00</p>
                            <p class="text-zinc-600">Sabtu: 08.00 - 17.00</p>
                            <p class="text-zinc-600">{{ __('frontend.location_sunday') }}: <span class="text-zinc-950 font-black">Hubungi kami</span></p>
                        </div>
                        <div class="bg-white border border-zinc-200 p-5">
                            <p class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600 mb-3">Kontak</p>
                            <a href="tel:+{{ $wa }}" class="text-zinc-950 font-black hover:text-orange-600 transition-colors">{{ $phone }}</a>
                            <p class="text-zinc-500 text-sm mt-2">Fast response via WhatsApp.</p>
                        </div>
                    </div>

                    @php $elfsightBH = \App\Models\SiteScript::inline('elfsight_business_hours'); @endphp
                    @if($elfsightBH)
                    <div class="bg-white border border-zinc-200 p-5">
                        {!! $elfsightBH !!}
                    </div>
                    @endif
                </div>

                <a href="https://share.google/udippS8AwuXA5Uz2P" target="_blank" rel="noopener noreferrer" class="relative mt-7 pa-btn-outline inline-flex items-center justify-between gap-4 font-black px-6 py-4 min-w-[230px] text-xs uppercase tracking-[.18em]">
                    <span>{{ __('frontend.location_maps_btn') }}</span>
                    <i data-lucide="map" class="w-5 h-5 text-orange-500"></i>
                </a>
            </div>

            <div class="relative bg-white border border-zinc-200 p-2 md:p-3 h-full overflow-hidden reveal-right shadow-xl shadow-zinc-950/5" data-delay="150">
                <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-orange-500 via-orange-400 to-transparent"></div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.549!2d112.7747!3d-7.2861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf3e8e1b4c1%3A0x0!2sJl.+Manyar+Kartika+Barat+No.9%2C+Menur+Pumpungan%2C+Kec.+Sukolilo%2C+Surabaya%2C+Jawa+Timur+60118!5e0!3m2!1sid!2sid!4v1700000000000"
                    width="100%"
                    height="560"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Prima Automotive Location"
                    class="relative min-h-[430px] grayscale-[.15] contrast-[1.04]"
                    style="border:0;">
                </iframe>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="pa-section bg-[#fffaf4] overflow-hidden">
    <span class="pa-section-line"></span>
    <div class="pa-container relative">
        <div class="grid lg:grid-cols-[.78fr_1.22fr] gap-7 lg:gap-10 reveal">
            <div class="bg-white border border-zinc-200 p-7 md:p-9 relative overflow-hidden shadow-xl shadow-zinc-950/5">
                <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-orange-500 via-orange-400 to-transparent"></div>
                <div class="relative">
                    <span class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600">{{ __('frontend.contact_badge') }}</span>
                    <h2 class="mt-5 text-5xl md:text-6xl font-black uppercase tracking-[-.07em] leading-[.86] text-zinc-950">{{ __('frontend.contact_title') }}</h2>
                    <p class="text-zinc-600 mt-6 text-lg leading-relaxed">{{ __('frontend.contact_desc') }}</p>
                </div>

                <div class="relative mt-9 grid gap-3">
                    @foreach([
                        ['title' => 'Alamat', 'desc' => 'Jl. Manyar Kartika Barat No.9, Sukolilo, Surabaya 60118'],
                        ['title' => __('frontend.contact_phone_f'), 'desc' => $phone, 'href' => 'tel:+' . $wa],
                        ['title' => __('frontend.location_hours'), 'desc' => 'Senin-Jumat 08.00 - 18.00 • Sabtu 08.00 - 17.00'],
                    ] as $item)
                    <div class="border border-zinc-200 bg-[#fffaf4] p-4">
                        <p class="text-[10px] font-black uppercase tracking-[.22em] text-orange-600 mb-2">{{ $item['title'] }}</p>
                        @if(isset($item['href']))
                        <a href="{{ $item['href'] }}" class="text-zinc-700 hover:text-orange-600 transition-colors text-sm leading-relaxed">{{ $item['desc'] }}</a>
                        @else
                        <p class="text-zinc-700 text-sm leading-relaxed">{{ $item['desc'] }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white border border-zinc-200 overflow-hidden shadow-xl shadow-zinc-950/5">
                <div class="p-7 md:p-9 border-b border-zinc-200 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                    <div>
                        <p class="text-[11px] font-black uppercase tracking-[.24em] text-orange-600">Fast Response</p>
                        <h3 class="mt-3 text-4xl md:text-5xl font-black uppercase tracking-[-.07em] leading-[.86] text-zinc-950">{{ __('frontend.contact_form_title') }}</h3>
                    </div>
                    <span class="text-[11px] font-black uppercase tracking-[.22em] text-zinc-400">WhatsApp Redirect</span>
                </div>
                <div class="p-7 md:p-9 bg-white">
                    <form class="space-y-5" id="contact-form" onsubmit="handleContactForm(event)">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] font-black uppercase tracking-[.18em] text-zinc-600 mb-2">{{ __('frontend.contact_name') }}</label>
                                <input type="text" name="nama" placeholder="{{ __('frontend.contact_name_ph') }}"
                                       class="w-full h-14 px-4 text-sm border border-zinc-200 bg-[#fffaf4] focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 outline-none transition-all"
                                       required>
                            </div>
                            <div>
                                <label class="block text-[11px] font-black uppercase tracking-[.18em] text-zinc-600 mb-2">{{ __('frontend.contact_phone_f') }}</label>
                                <input type="tel" name="telepon" placeholder="{{ __('frontend.contact_phone_ph') }}"
                                       class="w-full h-14 px-4 text-sm border border-zinc-200 bg-[#fffaf4] focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 outline-none transition-all"
                                       required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-black uppercase tracking-[.18em] text-zinc-600 mb-2">{{ __('frontend.contact_email') }}</label>
                            <input type="email" name="email" placeholder="{{ __('frontend.contact_email_ph') }}"
                                   class="w-full h-14 px-4 text-sm border border-zinc-200 bg-[#fffaf4] focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-[11px] font-black uppercase tracking-[.18em] text-zinc-600 mb-2">{{ __('frontend.contact_message') }}</label>
                            <textarea name="pesan" rows="4" placeholder="{{ __('frontend.contact_msg_ph') }}"
                                      class="w-full px-4 py-3 border border-zinc-200 bg-[#fffaf4] focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 outline-none resize-none transition-all text-sm"
                                      required></textarea>
                        </div>

                        <button type="submit" class="pa-btn-primary w-full inline-flex items-center justify-center gap-3 font-black py-4 text-xs uppercase tracking-[.18em]">
                            <span>Kirim Pesan</span>
                            <i data-lucide="send" class="w-5 h-5"></i>
                        </button>

                        <div id="form-alert" class="hidden p-4 text-sm font-bold"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@php $elfsightIG = \App\Models\SiteScript::inline('elfsight_instagram'); @endphp
@if($elfsightIG)
<section class="py-16 bg-white">
    <div class="pa-container text-center">
        <span class="pa-kicker">Instagram</span>
        <h2 class="text-4xl font-black uppercase tracking-[-.06em] text-zinc-950 mt-4 mb-8">@primaautomotivesby</h2>
        {!! $elfsightIG !!}
    </div>
</section>
@endif

<footer class="relative bg-zinc-950 text-white py-16 lg:py-20 overflow-hidden">
    <div class="absolute inset-x-0 top-0 h-[3px] bg-gradient-to-r from-orange-500 via-orange-400 to-transparent"></div>
    <div class="relative pa-container">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-14 mb-12">
            <div>
                @if($footerLogo)
                <div class="inline-flex">
                    <img src="{{ $footerLogo }}" alt="{{ $siteName }}" class="h-12 w-auto object-contain">
                </div>
                @else
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-white/10 border border-white/10 flex items-center justify-center">
                        <i data-lucide="car-front" class="w-6 h-6 text-orange-300"></i>
                    </div>
                    <div>
                        <div class="font-black text-white text-xl uppercase leading-tight tracking-[-.05em]">Prima</div>
                        <div class="font-black text-orange-300 text-[10px] tracking-[.24em] uppercase">Automotive</div>
                    </div>
                </div>
                @endif
                <p class="text-white/50 text-sm leading-relaxed mb-6">
                    {!! nl2br(e($settings['footer_tagline'] ?? "Teknisi berpengalaman.\nGratis Konsultasi.\nHasil akhir standar pabrik yang bergaransi.")) !!}
                </p>

                @php
                    $socials = [
                        ['url' => $settings['social_instagram'] ?? '', 'label' => 'IG'],
                        ['url' => $settings['social_facebook'] ?? '', 'label' => 'FB'],
                        ['url' => $settings['social_tiktok'] ?? '', 'label' => 'TT'],
                        ['url' => $settings['social_youtube'] ?? '', 'label' => 'YT'],
                    ];
                @endphp
                <div class="flex flex-wrap gap-2">
                    @foreach($socials as $social)
                        @if(!empty($social['url']))
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white/[.06] border border-white/10 hover:border-orange-400 flex items-center justify-center text-white/65 hover:text-orange-300 font-black text-xs transition-all">
                            {{ $social['label'] }}
                        </a>
                        @endif
                    @endforeach
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $wa) }}?text={{ urlencode('Halo Prima Automotive, saya ingin bertanya.') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-green-500/20 border border-green-400/20 hover:bg-green-500 flex items-center justify-center text-green-300 hover:text-white font-black text-xs transition-all">
                        WA
                    </a>
                </div>
            </div>

            <div>
                <h4 class="font-black text-sm uppercase tracking-[.22em] mb-6 text-orange-300">{{ __('frontend.footer_menu') }}</h4>
                <ul class="space-y-3">
                    @foreach ([
                        ['#hero', 'Beranda'],
                        ['#tracking', __('frontend.footer_track')],
                        ['#services', 'Layanan Kami'],
                        ['#about', 'Tentang Kami'],
                        ['#location', __('frontend.footer_location')],
                        ['#contact', __('frontend.contact_badge')],
                    ] as [$href, $label])
                    <li><a href="{{ $href }}" data-scroll-to="{{ $href }}" class="text-white/50 hover:text-white transition-colors cursor-pointer text-sm uppercase tracking-[.08em]">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="font-black text-sm uppercase tracking-[.22em] mb-6 text-orange-300">{{ __('frontend.footer_services') }}</h4>
                <ul class="space-y-3">
                    @foreach (['Perbaikan Pasca Kecelakaan','Pengecatan Ulang','Ceramic Coating','Paint Protection Film','Koreksi Cat & Poles'] as $layanan)
                    <li><span class="text-white/50 text-sm">{{ $layanan }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="font-black text-sm uppercase tracking-[.22em] mb-6 text-orange-300">{{ __('frontend.footer_contact') }}</h4>
                <ul class="space-y-4 text-white/50">
                    <li class="text-sm">Jl. Manyar Kartika Barat No.9, Sukolilo, Surabaya 60118</li>
                    <li><a href="tel:+{{ $wa }}" class="hover:text-white transition-colors text-sm">{{ $phone }}</a></li>
                    <li class="text-sm">Senin-Jumat: 08.00 - 18.00<br>Sabtu: 08.00 - 17.00</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-8 text-white/36 text-sm flex flex-col md:flex-row gap-3 md:items-center md:justify-between">
            <p>&copy; {{ date('Y') }} Prima Automotive. {{ __('frontend.footer_copyright') }}</p>
            <p class="uppercase tracking-[.18em] text-[10px]">Body Repair / Paint / Detailing</p>
        </div>
    </div>
</footer>

@push('scripts')
<script>
function handleContactForm(e) {
    e.preventDefault();
    const form    = document.getElementById('contact-form');
    const alert   = document.getElementById('form-alert');
    const btn     = form.querySelector('button[type="submit"]');
    const nama    = form.querySelector('[name="nama"]').value;
    const telepon = form.querySelector('[name="telepon"]').value;
    const pesan   = form.querySelector('[name="pesan"]').value;

    btn.disabled = true;
    btn.innerHTML = `<svg class="animate-spin w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> Mengirim...`;

    const waMsg = `Halo, saya ${nama} (${telepon}). ${pesan}`;
    const waUrl = `https://wa.me/{{ preg_replace('/[^0-9]/', '', $wa) }}?text=${encodeURIComponent(waMsg)}`;

    setTimeout(() => {
        alert.className = 'p-4 text-sm font-bold bg-green-50 text-green-700 border border-green-200';
        alert.textContent = 'Pesan berhasil disiapkan. Anda akan diarahkan ke WhatsApp...';
        alert.classList.remove('hidden');
        btn.disabled = false;
        btn.innerHTML = `<span>Kirim Pesan</span><i data-lucide="send" class="w-5 h-5"></i>`;
        lucide.createIcons();
        window.open(waUrl, '_blank');
        form.reset();
    }, 800);
}
</script>
@endpush
