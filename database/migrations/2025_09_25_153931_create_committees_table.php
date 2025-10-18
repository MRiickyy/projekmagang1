<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('university')->nullable();
            $table->string('country')->nullable();
            $table->enum('type', ['steering', 'technical program', 'organizing'])->nullable();
            $table->integer('event_year');
            $table->foreign('event_year')->references('year')->on('events')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('committees');
    }
};
