<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('author_informations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('AUTHOR INFORMATION');
            $table->string('cta_text')->default('Authors are requested to utilize the provided presentation format.');
            $table->string('cta_button')->default('Download Slide Format');
            $table->string('cta_link')->nullable();
            $table->text('intro_paragraph')->nullable();
            $table->text('submission_link')->nullable();

            // Sections
            $table->longText('selection_process')->nullable();
            $table->longText('preparation_of_contributions')->nullable();
            $table->longText('non_presented_policy')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('author_informations');
    }
};
