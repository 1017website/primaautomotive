<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('initials', 5)->nullable();
            $table->string('avatar_color')->default('from-blue-500 to-cyan-500');
            $table->tinyInteger('stars')->default(5);
            $table->text('content');
            $table->string('time_ago')->default('1 bulan lalu');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
