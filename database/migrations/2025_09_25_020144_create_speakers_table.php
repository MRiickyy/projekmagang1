<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('university');
            $table->string('image')->nullable(); // kalau kadang ga ada foto
            $table->text('biodata')->nullable();
            $table->enum('speaker_type', ['keynote', 'tutorial']); // hanya 2 pilihan
            $table->integer('event_year');
            $table->foreign('event_year')->references('year')->on('events')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};
