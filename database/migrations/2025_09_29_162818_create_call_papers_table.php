<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('call_papers', function (Blueprint $table) {
            $table->id();
            $table->string('section'); 
            $table->string('title')->nullable(); 
            $table->longText('content'); 
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('call_papers');
    }
};