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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code');
            $table->string('customer');
            $table->string('address');
            $table->unsignedBigInteger('city');
            $table->string('pin_code');
            // $table->unsignedBigInteger('state');
            // $table->unsignedBigInteger('state_code');
            // $table->unsignedBigInteger('country');
            $table->string('phone_no');
            $table->string('email');
            $table->string('web_address');
            $table->string('gst_no');
            $table->string('pan_no');
            $table->string('payment_terms');

            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
