<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Move favicon to 'general' group so it appears with logo settings
        DB::table('site_settings')
            ->where('key', 'seo_favicon')
            ->update([
                'group'      => 'general',
                'label'      => 'Favicon (ICO/PNG, tampil di tab browser)',
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        DB::table('site_settings')
            ->where('key', 'seo_favicon')
            ->update([
                'group'      => 'seo',
                'label'      => 'Favicon',
                'updated_at' => now(),
            ]);
    }
};
