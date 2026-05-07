<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add language support to site_settings
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('locale')->default('id')->after('group'); // 'id' or 'en'
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('locale');
        });
    }
};
