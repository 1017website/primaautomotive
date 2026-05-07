<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Semua setting bilingual yang perlu versi _en
     */
    private array $enSettings = [
        // HERO
        ['key' => 'hero_title_en',        'value' => 'Vehicle Body Repair & Care to Factory Standards',                                      'type' => 'text',     'group' => 'hero',    'label' => '[EN] Judul Hero'],
        ['key' => 'hero_subtitle_en',      'value' => "Experienced technicians.\nFree Consultation.\nFactory-standard results with warranty.", 'type' => 'textarea', 'group' => 'hero',    'label' => '[EN] Subtitle Hero'],
        ['key' => 'hero_badge_text_en',    'value' => 'Official Workshop Surabaya · Open Now',                                               'type' => 'text',     'group' => 'hero',    'label' => '[EN] Badge Teks'],

        // ABOUT
        ['key' => 'about_story_en',       'value' => "Founded in March 2022, we started this journey with a promise we hold firmly to this day — building customer trust by delivering quality and reliable service.\n\nWe saw this opportunity to bring something different: affordable, honest, and high-quality vehicle body repair services.\n\nEvery quote and estimate is shared openly and completely from the start, with no hidden fees. We only use OEM-specification materials that are proven to be durable.", 'type' => 'textarea', 'group' => 'about', 'label' => '[EN] Cerita / Story'],
        ['key' => 'about_vision_en',      'value' => 'To become the primary choice that sets a superior standard through quality, innovation, and customer satisfaction.',                                                                                                                                                                                                                                                                                              'type' => 'textarea', 'group' => 'about', 'label' => '[EN] Visi'],
        ['key' => 'about_missions_en',    'value' => "Restore vehicle condition as best as possible with utmost care.\nImprove technician competency through the latest methods.\nFoster customer trust so we become the primary choice.\nPrioritize quality, precision, and consistency.",                                                                                                                                                                               'type' => 'textarea', 'group' => 'about', 'label' => '[EN] Misi (one per line)'],
        ['key' => 'about_motto_en',       'value' => 'Achieving Excellence, Building Trust',                                                  'type' => 'text',     'group' => 'about',   'label' => '[EN] Moto Utama'],
        ['key' => 'about_tagline_en',     'value' => 'Precise, Neat, Proven',                                                                 'type' => 'text',     'group' => 'about',   'label' => '[EN] Tagline'],

        // LOCATION
        ['key' => 'location_hours_weekday_en', 'value' => 'Monday - Friday: 08.00 - 18.00',  'type' => 'text', 'group' => 'location', 'label' => '[EN] Jam Senin-Jumat'],
        ['key' => 'location_hours_saturday_en','value' => 'Saturday: 08.00 - 17.00',          'type' => 'text', 'group' => 'location', 'label' => '[EN] Jam Sabtu'],
        ['key' => 'location_hours_sunday_en',  'value' => 'Contact us',                       'type' => 'text', 'group' => 'location', 'label' => '[EN] Jam Minggu'],

        // CONTACT
        ['key' => 'contact_subtitle_en',  'value' => 'Contact us for more information about our services.', 'type' => 'textarea', 'group' => 'contact', 'label' => '[EN] Deskripsi Kontak'],

        // FOOTER
        ['key' => 'footer_tagline_en',    'value' => "Experienced technicians.\nFree Consultation.\nFactory-standard results with warranty.", 'type' => 'textarea', 'group' => 'footer', 'label' => '[EN] Tagline Footer'],
    ];

    public function up(): void
    {
        foreach ($this->enSettings as $setting) {
            DB::table('site_settings')->insertOrIgnore([
                'key'        => $setting['key'],
                'value'      => $setting['value'],
                'type'       => $setting['type'],
                'group'      => $setting['group'],
                'label'      => $setting['label'],
                'locale'     => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        $keys = array_column($this->enSettings, 'key');
        DB::table('site_settings')->whereIn('key', $keys)->delete();
    }
};
