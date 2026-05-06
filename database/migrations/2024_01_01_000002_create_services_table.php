<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('badge')->nullable();
            $table->text('description');
            $table->string('icon')->default('wrench'); // lucide icon name
            $table->string('gradient')->default('from-blue-500 to-cyan-500');
            $table->json('features')->nullable(); // list of bullet points
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
