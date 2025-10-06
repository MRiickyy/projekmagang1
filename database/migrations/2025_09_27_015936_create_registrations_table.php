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
            $table->string('cta_title')->nullable(); // "Please Register Here"
            $table->string('cta_button')->nullable(); // "Registration Form"
            $table->string('cta_link')->nullable();

            // Notes & fee includes
            $table->text('notes')->nullable();
            $table->text('conference_fee_include')->nullable();

            // Registration Procedures
            $table->text('registration_procedures')->nullable();

            $table->timestamps();
        });

        Schema::create('registration_fees', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->integer('usd_physical')->nullable();
            $table->integer('idr_physical')->nullable();
            $table->integer('usd_online')->nullable();
            $table->integer('idr_online')->nullable();
            $table->timestamps();
        });

        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('method_name');

            // Virtual Account fields
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('virtual_account_number')->nullable();

            // PayPal fields
            $table->string('paypal_email')->nullable();
            $table->text('additional_info')->nullable();

            // Catatan penting
            $table->text('important_notes')->nullable();

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
