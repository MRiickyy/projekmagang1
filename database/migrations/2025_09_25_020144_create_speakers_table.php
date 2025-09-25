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

            // Relasi ke tabel seminars
            // $table->unsignedBigInteger('seminar_id');
            // $table->foreign('seminar_id')->references('id')->on('seminars')->onDelete('cascade');

            $table->string('name');
            $table->string('university');
            $table->string('image')->nullable(); // kalau kadang ga ada foto
            $table->text('biodata');
            $table->longText('full_biodata')->nullable();
            $table->enum('speaker_type', ['keynote', 'tutorial']); // hanya 2 pilihan

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
