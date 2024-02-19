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
        Schema::create('address_contact', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->timestamps();
            $table->integer('contact_id')->nullable();
            $table->integer('address_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_contact');
    }
};
