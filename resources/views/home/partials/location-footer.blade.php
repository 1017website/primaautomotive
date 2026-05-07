{{-- ===== SECTION: KUNJUNGI KAMI (LOCATION) ===== --}}
<section id="location" class="relative py-20 bg-[#0a0f1a] overflow-hidden">

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-64 h-64 rounded-full bg-[#e67e22]/5 blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-80 h-80 rounded-full bg-blue-500/5 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center reveal">

            {{-- LEFT: Info Card --}}
            <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-8 md:p-10">
                <span class="inline-block px-4 py-2 bg-[#e67e22]/10 text-[#e67e22] font-semibold rounded-full text-sm mb-4">{{ __('frontend.location_badge') }}</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#0a1628] mb-6">{{ __('frontend.location_title') }}</h2>

                <div class="space-y-6">

                    {{-- Alamat --}}
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e67e22]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-[#e67e22]">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">{{ __('frontend.location_address') }}</h4>
                            <p class="text-gray-600">Jl. Manyar Kartika Barat No.9</p>
                            <p class="text-gray-600">Menur Pumpungan, Kec. Sukolilo</p>
                            <p class="text-gray-600">Surabaya, Jawa Timur 60118</p>
                        </div>
                    </div>

                    {{-- Jam Operasional --}}
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e67e22]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-[#e67e22]">
                                <path d="M12 6v6l4 2"/><circle cx="12" cy="12" r="10"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">{{ __('frontend.location_hours') }}</h4>
                            <p class="text-gray-600 text-base">Senin - Jumat: 08.00 - 18.00</p>
                            <p class="text-gray-600 text-base">Sabtu: 08.00 - 17.00</p>
                            <p class="text-gray-600 text-base">{{ __('frontend.location_sunday') }}: <span class="text-red-500 font-semibold">Hubungi kami</span></p>
                        </div>
                    </div>

                    {{-- Elfsight Business Hours Widget --}}
                    @php $elfsightBH = \App\Models\SiteScript::inline('elfsight_business_hours'); @endphp
                    @if($elfsightBH)
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        {!! $elfsightBH !!}
                    </div>
                    @endif


                    {{-- Kontak --}}
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e67e22]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-[#e67e22]">
                                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Kontak</h4>
                            <a href="tel:+{{ $settings['contact_whatsapp'] ?? '6287853722011' }}" class="text-gray-600 hover:text-[#e67e22] transition-colors">{{ $settings['contact_phone'] ?? '0878-5372-2011' }}</a>
                        </div>
                    </div>
                </div>

                {{-- CTA Button --}}
                <a href="https://share.google/udippS8AwuXA5Uz2P" target="_blank" rel="noopener noreferrer">
                    <button class="btn-lift inline-flex items-center mt-6 bg-[#e67e22] hover:bg-[#d35400] text-white font-bold px-8 py-4 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/>
                        </svg>
                        {{ __('frontend.location_maps_btn') }}
                    </button>
                </a>
            </div>

            {{-- RIGHT: Google Maps Embed --}}
            <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-4 reveal-right" data-delay="150">
                <div class="rounded-2xl overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.549!2d112.7747!3d-7.2861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf3e8e1b4c1%3A0x0!2sJl.+Manyar+Kartika+Barat+No.9%2C+Menur+Pumpungan%2C+Kec.+Sukolilo%2C+Surabaya%2C+Jawa+Timur+60118!5e0!3m2!1sid!2sid!4v1700000000000"
                        width="100%"
                        height="450"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Prima Automotive Location"
                        class="grayscale-[20%] hover:grayscale-0 transition-all duration-500"
                        style="border: 0px;">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ===== SECTION: HUBUNGI KAMI (CONTACT + FORM) ===== --}}
<section id="contact" class="relative py-20 overflow-hidden bg-white">

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-20 w-72 h-72 rounded-full bg-orange-50 blur-3xl opacity-70"></div>
        <div class="absolute bottom-20 left-20 w-56 h-56 rounded-full bg-blue-50 blur-3xl opacity-70"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 reveal">

            {{-- LEFT: Contact Info --}}
            <div class="bg-white/95 backdrop-blur-sm p-8 rounded-2xl shadow-xl">
                <span class="inline-block px-4 py-2 bg-[#e67e22]/10 text-[#e67e22] font-semibold rounded-full text-sm mb-4">{{ __('frontend.contact_badge') }}</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#0a1628] mb-6">{{ __('frontend.contact_title') }}</h2>
                <p class="text-gray-600 mb-8">{{ __('frontend.contact_desc') }}</p>

                <div class="space-y-6">
                    {{-- Alamat --}}
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e67e22]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-[#e67e22]">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Alamat</h4>
                            <p class="text-gray-600">Jl. Manyar Kartika Barat No.9</p>
                            <p class="text-gray-600">Sukolilo, Surabaya 60118</p>
                        </div>
                    </div>

                    {{-- Telepon --}}
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e67e22]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-[#e67e22]">
                                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">{{ __('frontend.contact_phone_f') }}</h4>
                            <a href="tel:+{{ $settings['contact_whatsapp'] ?? '6287853722011' }}" class="text-gray-600 hover:text-[#e67e22] transition-colors">{{ $settings['contact_phone'] ?? '0878-5372-2011' }}</a>
                        </div>
                    </div>

                    {{-- Jam Operasional --}}
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e67e22]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-[#e67e22]">
                                <path d="M12 6v6l4 2"/><circle cx="12" cy="12" r="10"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">{{ __('frontend.location_hours') }}</h4>
                            <p class="text-gray-600 text-base">Senin - Jumat: 08.00 - 18.00</p>
                            <p class="text-gray-600 text-base">Sabtu: 08.00 - 17.00</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Contact Form --}}
            <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-xl">
                <div class="p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">{{ __('frontend.contact_form_title') }}</h3>

                    <form class="space-y-6" id="contact-form" onsubmit="handleContactForm(event)">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('frontend.contact_name') }}</label>
                                <input type="text" name="nama" placeholder="{{ __('frontend.contact_name_ph') }}"
                                       class="w-full h-12 px-3 text-sm border border-gray-200 rounded-md bg-transparent focus:border-[#e67e22] focus:ring-2 focus:ring-[#e67e22]/20 outline-none transition-all"
                                       required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('frontend.contact_phone_f') }}</label>
                                <input type="tel" name="telepon" placeholder="{{ __('frontend.contact_phone_ph') }}"
                                       class="w-full h-12 px-3 text-sm border border-gray-200 rounded-md bg-transparent focus:border-[#e67e22] focus:ring-2 focus:ring-[#e67e22]/20 outline-none transition-all"
                                       required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('frontend.contact_email') }}</label>
                            <input type="email" name="email" placeholder="{{ __('frontend.contact_email_ph') }}"
                                   class="w-full h-12 px-3 text-sm border border-gray-200 rounded-md bg-transparent focus:border-[#e67e22] focus:ring-2 focus:ring-[#e67e22]/20 outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('frontend.contact_message') }}</label>
                            <textarea name="pesan" rows="4" placeholder="{{ __('frontend.contact_msg_ph') }}"
                                      class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#e67e22] focus:ring-2 focus:ring-[#e67e22]/20 outline-none resize-none transition-all text-sm"
                                      required></textarea>
                        </div>

                        <button type="submit"
                                class="btn-lift w-full inline-flex items-center justify-center gap-2 bg-[#e67e22] hover:bg-[#d35400] text-white font-bold py-4 text-lg rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                <path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"/>
                            </svg>
                            Kirim Pesan
                        </button>

                        <div id="form-alert" class="hidden rounded-lg p-4 text-sm font-medium"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- ===== ELFSIGHT INSTAGRAM FEED ===== --}}
@php $elfsightIG = \App\Models\SiteScript::inline('elfsight_instagram'); @endphp
@if($elfsightIG)
<section class="py-14 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-pink-100 text-pink-600 font-semibold rounded-full text-sm mb-4">Instagram</span>
        <h2 class="text-2xl font-extrabold text-[#0a1628] mb-8">@primaautomotivesby</h2>
        {!! $elfsightIG !!}
    </div>
</section>
@endif

{{-- ===== FOOTER ===== --}}
<footer class="bg-[#0a1628] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

            {{-- Col 1: Brand --}}
            <div class="lg:col-span-1">
                @php
                    $footerLogo = \App\Models\SiteSetting::get('site_logo_white') ?: \App\Models\SiteSetting::get('site_logo');
                    $siteName   = \App\Models\SiteSetting::get('site_name', 'Prima Automotive');
                @endphp
                @if($footerLogo)
                <img src="{{ $footerLogo }}" alt="{{ $siteName }}" class="h-16 w-auto object-contain mb-4">
                @else
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#e67e22] to-[#d35400] rounded-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                            <circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-black text-white text-xl leading-tight">Prima</div>
                        <div class="font-bold text-[#e67e22] text-xs tracking-widest">AUTOMOTIVE</div>
                    </div>
                </div>
                @endif
                <p class="text-gray-400 text-sm leading-relaxed mb-5">
                    {{ $settings['footer_tagline'] ?? "Teknisi berpengalaman.\nGratis Konsultasi.\nHasil akhir standar pabrik yang bergaransi." }}
                </p>

                {{-- Social Media Icons --}}
                @php
                    $socials = [
                        'instagram' => [
                            'url'   => $settings['social_instagram'] ?? '',
                            'label' => 'Instagram',
                            'color' => 'hover:bg-gradient-to-br hover:from-purple-500 hover:via-pink-500 hover:to-orange-400',
                            'svg'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>',
                        ],
                        'whatsapp' => [
                            'url'   => $settings['social_whatsapp'] ?? $settings['contact_whatsapp'] ?? '',
                            'label' => 'WhatsApp',
                            'color' => 'hover:bg-green-600',
                            'iswa'  => true,
                            'svg'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>',
                        ],
                        'facebook' => [
                            'url'   => $settings['social_facebook'] ?? '',
                            'label' => 'Facebook',
                            'color' => 'hover:bg-blue-600',
                            'svg'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
                        ],
                        'tiktok' => [
                            'url'   => $settings['social_tiktok'] ?? '',
                            'label' => 'TikTok',
                            'color' => 'hover:bg-black',
                            'svg'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.76a4.85 4.85 0 01-1.01-.07z"/></svg>',
                        ],
                        'youtube' => [
                            'url'   => $settings['social_youtube'] ?? '',
                            'label' => 'YouTube',
                            'color' => 'hover:bg-red-600',
                            'svg'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>',
                        ],
                    ];
                @endphp

                <div class="flex flex-wrap gap-2">
                    @foreach($socials as $key => $social)
                        @if(!empty($social['url']))
                        @php
                            $href = isset($social['iswa'])
                                ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $social['url']) . '?text=' . urlencode('Halo Prima Automotive, saya ingin bertanya.')
                                : $social['url'];
                        @endphp
                        <a href="{{ $href }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="{{ $social['label'] }}"
                           class="w-9 h-9 bg-white/10 {{ $social['color'] }} rounded-lg flex items-center justify-center text-white transition-all duration-200 hover:scale-110">
                            {!! $social['svg'] !!}
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Col 2: {{ __('frontend.footer_menu') }} --}}
            <div>
                <h4 class="font-bold text-lg mb-6 text-[#e67e22]">{{ __('frontend.footer_menu') }}</h4>
                <ul class="space-y-3">
                    @foreach ([
                        ['#hero',     'Beranda'],
                        ['#tracking', __('frontend.footer_track')],
                        ['#services', 'Layanan Kami'],
                        ['#about',    'Tentang Kami'],
                        ['#location', __('frontend.footer_location')],
                        ['#contact',  __('frontend.contact_badge')],
                    ] as [$href, $label])
                    <li>
                        <a href="{{ $href }}" data-scroll-to="{{ $href }}"
                           class="text-gray-400 hover:text-white transition-colors cursor-pointer text-sm">
                            {{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Col 3: Layanan --}}
            <div>
                <h4 class="font-bold text-lg mb-6 text-[#e67e22]">{{ __('frontend.footer_services') }}</h4>
                <ul class="space-y-3">
                    @foreach ([
                        'Perbaikan Pasca Kecelakaan',
                        'Pengecatan Ulang',
                        'Ceramic Coating',
                        'Paint Protection Film',
                        'Koreksi Cat & Poles',
                    ] as $layanan)
                    <li><span class="text-gray-400 text-sm">{{ $layanan }}</span></li>
                    @endforeach
                </ul>
            </div>

            {{-- Col 4: Hubungi Kami --}}
            <div>
                <h4 class="font-bold text-lg mb-6 text-[#e67e22]">{{ __('frontend.footer_contact') }}</h4>
                <ul class="space-y-4 text-gray-400">
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-[#e67e22] flex-shrink-0 mt-0.5">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/>
                        </svg>
                        <span class="text-sm">Jl. Manyar Kartika Barat No.9, Sukolilo, Surabaya 60118</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-[#e67e22] flex-shrink-0">
                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/>
                        </svg>
                        <a href="tel:+{{ $settings['contact_whatsapp'] ?? '6287853722011' }}" class="hover:text-white transition-colors text-sm">{{ $settings['contact_phone'] ?? '0878-5372-2011' }}</a>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-[#e67e22] flex-shrink-0 mt-0.5">
                            <path d="M12 6v6l4 2"/><circle cx="12" cy="12" r="10"/>
                        </svg>
                        <div class="text-sm">
                            <p>Senin-Jumat: 08.00 - 18.00</p>
                            <p>Sabtu: 08.00 - 17.00</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-gray-800 pt-8 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} Prima Automotive. {{ __('frontend.footer_copyright') }}</p>
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
    btn.innerHTML = `<svg class="animate-spin w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> Mengirim...`;

    const waMsg = `Halo, saya ${nama} (${telepon}). ${pesan}`;
    const waUrl = `https://wa.me/{{ $settings['contact_whatsapp'] ?? '6287853722011' }}?text=${encodeURIComponent(waMsg)}`;

    setTimeout(() => {
        alert.className = 'rounded-lg p-4 text-sm font-medium bg-green-50 text-green-700 border border-green-200';
        alert.textContent = 'Pesan berhasil dikirim! Anda akan diarahkan ke WhatsApp...';
        alert.classList.remove('hidden');
        btn.disabled = false;
        btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"/></svg>Kirim Pesan`;
        window.open(waUrl, '_blank');
        form.reset();
    }, 800);
}
</script>
@endpush
