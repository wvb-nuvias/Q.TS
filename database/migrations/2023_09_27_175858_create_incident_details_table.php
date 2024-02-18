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
        Schema::create('incident_details', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->integer('incidentnr')->nullable();
            $table->integer('incident_id')->nullable();
            $table->integer('createdby')->nullable();
            $table->text('description')->nullable();
            $table->integer('timespent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_details');
    }
};
