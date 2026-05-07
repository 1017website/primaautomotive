<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_scripts', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();          // google_ads, meta_pixel, elfsight_reviews, elfsight_instagram, gtm, custom_head, custom_body
            $table->string('label');
            $table->longText('code')->nullable();     // the actual script/embed code
            $table->boolean('is_active')->default(false);
            $table->string('position')->default('head'); // head | body_start | body_end
            $table->string('group')->default('ads');   // ads | analytics | embed | custom
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_scripts');
    }
};
