<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteScript;

class SiteScriptSeeder extends Seeder
{
    public function run(): void
    {
        $scripts = [
            // ADS
            ['key' => 'google_ads',              'label' => 'Google Ads (Global Site Tag)',                                       'code' => null, 'is_active' => false, 'position' => 'head',     'group' => 'ads'],
            ['key' => 'meta_pixel',              'label' => 'Meta Pixel (Facebook Ads)',                                          'code' => null, 'is_active' => false, 'position' => 'head',     'group' => 'ads'],
            ['key' => 'tiktok_pixel',            'label' => 'TikTok Pixel',                                                      'code' => null, 'is_active' => false, 'position' => 'head',     'group' => 'ads'],
            // ANALYTICS
            ['key' => 'google_tag_manager_head', 'label' => 'Google Tag Manager (Head)',                                         'code' => null, 'is_active' => false, 'position' => 'head',     'group' => 'analytics'],
            ['key' => 'google_tag_manager_body', 'label' => 'Google Tag Manager (Body)',                                         'code' => null, 'is_active' => false, 'position' => 'body_start','group' => 'analytics'],
            ['key' => 'google_analytics',        'label' => 'Google Analytics 4 (GA4)',                                          'code' => null, 'is_active' => false, 'position' => 'head',     'group' => 'analytics'],
            // ELFSIGHT
            ['key' => 'elfsight_loader',         'label' => 'Elfsight — Script Loader (wajib diisi jika pakai widget apapun)',   'code' => null, 'is_active' => false, 'position' => 'head',     'group' => 'embed'],
            ['key' => 'elfsight_google_reviews', 'label' => 'Elfsight — Google Reviews (tampil di section Ulasan)',              'code' => null, 'is_active' => false, 'position' => 'inline',   'group' => 'embed'],
            ['key' => 'elfsight_instagram',      'label' => 'Elfsight — Instagram Feed (tampil sebelum footer)',                 'code' => null, 'is_active' => false, 'position' => 'inline',   'group' => 'embed'],
            ['key' => 'elfsight_business_hours', 'label' => 'Elfsight — Business Hours / Status Buka-Tutup (tampil di section Lokasi)', 'code' => null, 'is_active' => false, 'position' => 'inline', 'group' => 'embed'],
            ['key' => 'elfsight_whatsapp',       'label' => 'Elfsight — WhatsApp Chat Button (floating semua halaman)',          'code' => null, 'is_active' => false, 'position' => 'body_end', 'group' => 'embed'],
            // CUSTOM
            ['key' => 'custom_head',             'label' => 'Custom Script (Head)',                                              'code' => null, 'is_active' => false, 'position' => 'head',     'group' => 'custom'],
            ['key' => 'custom_body_end',         'label' => 'Custom Script (Body End)',                                          'code' => null, 'is_active' => false, 'position' => 'body_end', 'group' => 'custom'],
        ];

        foreach ($scripts as $s) {
            SiteScript::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
