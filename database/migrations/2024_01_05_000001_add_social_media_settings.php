<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $socials = [
            ['key' => 'social_instagram', 'value' => 'https://www.instagram.com/primaautomotivesby', 'type' => 'text', 'group' => 'contact', 'label' => 'URL Instagram'],
            ['key' => 'social_whatsapp',  'value' => '6287853722011', 'type' => 'text', 'group' => 'contact', 'label' => 'Nomor WhatsApp (kode negara, contoh: 6287853722011)'],
            ['key' => 'social_facebook',  'value' => '', 'type' => 'text', 'group' => 'contact', 'label' => 'URL Facebook (kosongkan jika tidak ada)'],
            ['key' => 'social_tiktok',    'value' => '', 'type' => 'text', 'group' => 'contact', 'label' => 'URL TikTok (kosongkan jika tidak ada)'],
            ['key' => 'social_youtube',   'value' => '', 'type' => 'text', 'group' => 'contact', 'label' => 'URL YouTube (kosongkan jika tidak ada)'],
        ];

        foreach ($socials as $s) {
            DB::table('site_settings')->insertOrIgnore(array_merge($s, [
                'locale'     => 'id',
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }

    public function down(): void
    {
        DB::table('site_settings')->whereIn('key', [
            'social_instagram','social_whatsapp','social_facebook','social_tiktok','social_youtube'
        ])->delete();
    }
};
