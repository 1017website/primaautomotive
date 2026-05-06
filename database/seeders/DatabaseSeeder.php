<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Service;
use App\Models\Review;
use App\Models\SiteSetting;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ===== ADMIN USER =====
        User::firstOrCreate(
            ['email' => 'admin@primaautomotive.id'],
            [
                'name'     => 'Admin Prima Automotive',
                'password' => Hash::make('admin123'),
            ]
        );

        // ===== SITE SETTINGS =====
        $settings = [
            // --- HERO ---
            ['key' => 'hero_title',       'value' => 'Perbaikan & Perawatan Bodi Kendaraan Standar Pabrik', 'type' => 'text',     'group' => 'hero',    'label' => 'Judul Hero'],
            ['key' => 'hero_subtitle',    'value' => "Teknisi berpengalaman.\nKonsultasi Gratis.\nHasil akhir standar pabrik yang bergaransi.", 'type' => 'textarea', 'group' => 'hero', 'label' => 'Subtitle Hero'],
            ['key' => 'hero_stat_repairs','value' => '2000',  'type' => 'text', 'group' => 'hero', 'label' => 'Stat: Perbaikan Selesai'],
            ['key' => 'hero_stat_rating', 'value' => '4.6',   'type' => 'text', 'group' => 'hero', 'label' => 'Stat: Rating Google'],
            ['key' => 'hero_stat_happy',  'value' => '95',    'type' => 'text', 'group' => 'hero', 'label' => 'Stat: Pelanggan Puas (%)'],
            ['key' => 'hero_stat_warranty','value' => '6-24', 'type' => 'text', 'group' => 'hero', 'label' => 'Stat: Garansi (Bulan)'],
            ['key' => 'hero_badge_text',  'value' => 'Bengkel Resmi Surabaya · Buka Sekarang', 'type' => 'text', 'group' => 'hero', 'label' => 'Badge Teks'],

            // --- REVIEWS ---
            ['key' => 'reviews_total_rating', 'value' => '4.6',  'type' => 'text', 'group' => 'reviews', 'label' => 'Rating Keseluruhan'],
            ['key' => 'reviews_total_count',  'value' => '45',   'type' => 'text', 'group' => 'reviews', 'label' => 'Jumlah Ulasan'],
            ['key' => 'reviews_happy_percent','value' => '95',   'type' => 'text', 'group' => 'reviews', 'label' => 'Pelanggan Puas (%)'],
            ['key' => 'reviews_google_url',   'value' => 'https://share.google/udippS8AwuXA5Uz2P', 'type' => 'text', 'group' => 'reviews', 'label' => 'URL Google Reviews'],

            // --- ABOUT ---
            ['key' => 'about_founded',    'value' => 'Maret 2022', 'type' => 'text',     'group' => 'about', 'label' => 'Tahun Berdiri'],
            ['key' => 'about_story',      'value' => "Didirikan pada Maret 2022, kami memulai langkah ini dengan janji yang kami pegang teguh hingga kini — membangun kepercayaan pelanggan dengan menghadirkan layanan yang berkualitas dan bisa diandalkan.\n\nKami melihat peluang ini sebagai kesempatan untuk menghadirkan sesuatu yang berbeda, yaitu layanan perbaikan bodi kendaraan yang terjangkau, jujur, dan berkualitas tinggi.\n\nSetiap penawaran dan estimasi kami sampaikan secara terbuka dan lengkap sejak awal, tanpa ada biaya tersembunyi. Kami hanya menggunakan bahan sesuai spesifikasi pabrikan (OEM) yang terbukti tahan lama.", 'type' => 'textarea', 'group' => 'about', 'label' => 'Cerita / Story'],
            ['key' => 'about_vision',     'value' => 'Menjadi pilihan utama yang menetapkan standar unggul melalui kualitas, inovasi, dan kepuasan pelanggan.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Visi'],
            ['key' => 'about_missions',   'value' => "Memulihkan kondisi kendaraan sebaik mungkin dengan kehati-hatian.\nMeningkatkan kompetensi teknisi lewat metode terkini.\nMemupuk kepercayaan pelanggan sehingga menjadi pilihan utama.\nMengutamakan kualitas, presisi, dan konsistensi.", 'type' => 'textarea', 'group' => 'about', 'label' => 'Misi (satu per baris)'],
            ['key' => 'about_motto',      'value' => 'Mewujudkan Keunggulan, Membangun Kepercayaan', 'type' => 'text', 'group' => 'about', 'label' => 'Moto Utama'],
            ['key' => 'about_tagline',    'value' => 'Presisi, Rapi, Terbukti', 'type' => 'text', 'group' => 'about', 'label' => 'Tagline'],
            ['key' => 'about_hashtag',    'value' => '#PastiGlowing', 'type' => 'text', 'group' => 'about', 'label' => 'Hashtag'],
            ['key' => 'about_warranty',   'value' => 'Garansi 6-24 Bulan', 'type' => 'text', 'group' => 'about', 'label' => 'Value: Garansi'],
            ['key' => 'about_paint_brand','value' => 'Autoglow & Glasurit', 'type' => 'text', 'group' => 'about', 'label' => 'Value: Merk Cat'],
            ['key' => 'about_experience', 'value' => 'Teknisi Profesional', 'type' => 'text', 'group' => 'about', 'label' => 'Value: Teknisi'],

            // --- LOCATION ---
            ['key' => 'location_address_line1', 'value' => 'Jl. Manyar Kartika Barat No.9',         'type' => 'text', 'group' => 'location', 'label' => 'Alamat Baris 1'],
            ['key' => 'location_address_line2', 'value' => 'Menur Pumpungan, Kec. Sukolilo',         'type' => 'text', 'group' => 'location', 'label' => 'Alamat Baris 2'],
            ['key' => 'location_address_line3', 'value' => 'Surabaya, Jawa Timur 60118',             'type' => 'text', 'group' => 'location', 'label' => 'Alamat Baris 3'],
            ['key' => 'location_hours_weekday', 'value' => 'Senin - Jumat: 08.00 - 18.00',           'type' => 'text', 'group' => 'location', 'label' => 'Jam Senin-Jumat'],
            ['key' => 'location_hours_saturday','value' => 'Sabtu: 08.00 - 17.00',                   'type' => 'text', 'group' => 'location', 'label' => 'Jam Sabtu'],
            ['key' => 'location_hours_sunday',  'value' => 'Hubungi kami',                            'type' => 'text', 'group' => 'location', 'label' => 'Jam Minggu'],
            ['key' => 'location_maps_embed',    'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.549!2d112.7747!3d-7.2861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf3e8e1b4c1%3A0x0!2sJl.+Manyar+Kartika+Barat+No.9!5e0!3m2!1sid!2sid!4v1700000000000', 'type' => 'textarea', 'group' => 'location', 'label' => 'Google Maps Embed URL'],
            ['key' => 'location_maps_share_url','value' => 'https://share.google/udippS8AwuXA5Uz2P', 'type' => 'text', 'group' => 'location', 'label' => 'Google Maps Share URL'],

            // --- CONTACT ---
            ['key' => 'contact_phone',    'value' => '0878-5372-2011',           'type' => 'text', 'group' => 'contact', 'label' => 'Nomor Telepon'],
            ['key' => 'contact_whatsapp', 'value' => '6287853722011',            'type' => 'text', 'group' => 'contact', 'label' => 'Nomor WhatsApp (kode negara)'],
            ['key' => 'contact_email',    'value' => 'info@primaautomotive.id',   'type' => 'text', 'group' => 'contact', 'label' => 'Email'],
            ['key' => 'contact_instagram','value' => 'https://www.instagram.com/primaautomotivesby', 'type' => 'text', 'group' => 'contact', 'label' => 'URL Instagram'],

            // --- FOOTER ---
            ['key' => 'footer_tagline',   'value' => "Teknisi berpengalaman.\nGratis Konsultasi.\nHasil akhir standar pabrik yang bergaransi.", 'type' => 'textarea', 'group' => 'footer', 'label' => 'Tagline Footer'],
            ['key' => 'footer_copyright', 'value' => 'Prima Automotive',         'type' => 'text', 'group' => 'footer', 'label' => 'Nama Copyright'],

            // --- SEO ---
            ['key' => 'seo_title',        'value' => 'Prima Automotive - Bengkel Cat & Perbaikan Body Mobil Surabaya', 'type' => 'text',     'group' => 'seo', 'label' => 'SEO Title'],
            ['key' => 'seo_description',  'value' => 'Bengkel cat mobil dan perbaikan body profesional di Surabaya. Garansi 6-24 bulan, teknisi berpengalaman, hasil standar pabrik.', 'type' => 'textarea', 'group' => 'seo', 'label' => 'SEO Description'],
            ['key' => 'seo_keywords',     'value' => 'bengkel cat mobil surabaya, perbaikan body mobil, ceramic coating surabaya, ppf surabaya, bengkel body surabaya', 'type' => 'textarea', 'group' => 'seo', 'label' => 'SEO Keywords'],
            ['key' => 'seo_og_image',     'value' => '',  'type' => 'image',    'group' => 'seo', 'label' => 'OG Image (Share Preview)'],
            ['key' => 'seo_favicon',      'value' => '',  'type' => 'image',    'group' => 'seo', 'label' => 'Favicon'],

            // --- GENERAL ---
            ['key' => 'site_logo',        'value' => '',  'type' => 'image',    'group' => 'general', 'label' => 'Logo (warna)'],
            ['key' => 'site_logo_white',  'value' => '',  'type' => 'image',    'group' => 'general', 'label' => 'Logo (putih)'],
            ['key' => 'site_name',        'value' => 'Prima Automotive', 'type' => 'text', 'group' => 'general', 'label' => 'Nama Website'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::firstOrCreate(['key' => $setting['key']], $setting);
        }

        // ===== SERVICES =====
        Service::firstOrCreate(['title' => 'Perbaikan & Pengecatan Ulang Pasca Kecelakaan'], [
            'badge'       => 'Perbaikan Tabrakan',
            'description' => 'Kami paham ketika kendaraan Anda memiliki cacat kosmetik atau bekas tabrak membuat Anda tidak percaya diri. Biarkan kami yang memperbaiki — kendaraan Anda kembali rapi, cantik, dan tampak seperti baru.',
            'icon'        => 'wrench',
            'gradient'    => 'from-blue-500 to-cyan-500',
            'features'    => json_encode([
                'Pengecatan Warna Standar dan Warna Spesial',
                'Perbaikan Panel Plastik',
                'Perbaikan Struktural & Bodi',
                'Penghilangan Penyok Panel (Paintless)',
                'Layanan OneDay',
                'Perbaikan Khusus',
            ]),
            'is_active'   => true,
            'sort_order'  => 1,
        ]);

        Service::firstOrCreate(['title' => 'Pemulihan & Perawatan Cat Kendaraan'], [
            'badge'       => 'Perawatan Mobil',
            'description' => 'Layanan Ceramic Coating dan Ceramic Clear dari PPG memberi lapisan pelindung super kuat, tahan gores, tahan UV, dan mengilap seperti kaca. Kami juga pasang PPF (Paint Protection Film) yang melindungi cat asli.',
            'icon'        => 'sparkles',
            'gradient'    => 'from-emerald-400 to-teal-500',
            'features'    => json_encode([
                'Koreksi Cat 3 Tahap & Poles',
                'Nano Ceramic Coating by Crystal Shield',
                'Perlindungan CeramicClear by PPG',
                'PPF (Paint Protection Film)',
                'Detailing & Interior Cleaning',
            ]),
            'is_active'   => true,
            'sort_order'  => 2,
        ]);

        // ===== REVIEWS =====
        $reviews = [
            ['name' => 'Ahmad Fauzi',   'initials' => 'AF', 'avatar_color' => 'from-blue-500 to-cyan-500',    'stars' => 5, 'content' => 'Hasil pengerjaan sangat memuaskan, catnya rapi dan matching sempurna. Recommended!', 'time_ago' => '2 minggu lalu', 'sort_order' => 1],
            ['name' => 'Dewi Kusuma',   'initials' => 'DK', 'avatar_color' => 'from-emerald-500 to-teal-500', 'stars' => 5, 'content' => 'Pelayanan ramah, proses cepat, dan harga transparan. Mobil jadi kinclong lagi.',          'time_ago' => '1 bulan lalu',  'sort_order' => 2],
            ['name' => 'Budi Santoso',  'initials' => 'BS', 'avatar_color' => 'from-purple-500 to-pink-500',  'stars' => 5, 'content' => 'Teknisi profesional, ruang tunggu nyaman. Hasil akhir melebihi ekspektasi.',              'time_ago' => '2 bulan lalu',  'sort_order' => 3],
        ];

        foreach ($reviews as $review) {
            Review::firstOrCreate(['name' => $review['name']], array_merge($review, ['is_active' => true]));
        }
    }
}
