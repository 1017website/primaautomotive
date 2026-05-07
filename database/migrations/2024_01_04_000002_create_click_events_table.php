<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('click_events', function (Blueprint $table) {
            $table->id();
            $table->string('event');       // wa_chat, wa_float, phone_call, book_appointment, maps_open, google_review
            $table->string('label')->nullable(); // additional context
            $table->string('page')->nullable();
            $table->string('ip', 45)->nullable();
            $table->string('device')->default('desktop');
            $table->timestamp('clicked_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('click_events');
    }
};
