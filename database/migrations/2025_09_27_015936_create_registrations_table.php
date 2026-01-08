<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('section');
            $table->text('content')->nullable();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('registration_fees', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->integer('usd_early_bird')->nullable();
            $table->integer('usd_reguler')->nullable();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('method_name');

            // Virtual Account fields
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank_number')->nullable();

            // PayPal fields
            $table->string('paypal_email')->nullable();
            $table->text('additional_info')->nullable();

            // Catatan penting
            $table->text('important_notes')->nullable();
            
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('registration_fees');
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('payment_methods');
    }
};
