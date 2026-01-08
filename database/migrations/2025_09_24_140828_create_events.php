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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year');
            $table->string('main_title')->nullable(); // contoh: "THE 13TH ICOICT"
            $table->string('subtitle')->nullable(); // contoh: "International Conference on Information and Communication Technology"
            $table->string('location')->nullable(); // contoh: "Bandung (Hybrid)"
            $table->string('date_range')->nullable(); // contoh: "30–31 July 2025"
            $table->time('event_time')->nullable();
            $table->string('register_link')->nullable(); // contoh: "/newacc"
            $table->string('submit_link')->nullable(); // contoh: "/login"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
