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
            $table->string('main_title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('location')->nullable();
            $table->string('date_range')->nullable();
            $table->time('event_time')->nullable();
            $table->string('register_link')->nullable();
            $table->string('submit_link')->nullable();
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
