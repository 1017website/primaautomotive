<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('/');          // URL path
            $table->string('ip', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referer')->nullable();
            $table->string('country', 5)->nullable();
            $table->string('device')->default('desktop');  // desktop | mobile | tablet
            $table->string('locale', 5)->default('id');
            $table->timestamp('visited_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
