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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->string('hostname',250)->nullable();
            $table->string('ip',15)->nullable();
            $table->string('sysname',250)->nullable();
            $table->string('sysdesc',250)->nullable();
            $table->string('syscontact',250)->nullable();
            $table->string('sysos',50)->nullable();
            $table->string('sysversion',50)->nullable();
            $table->integer('devicetype_id');
            $table->integer('brand_id');
            $table->string('hardware',250)->nullable();
            $table->string('serial',250)->nullable();
            $table->integer('addressid');
            $table->string('image',250)->nullable();
            $table->string('icon',250)->nullable();
            $table->text('notes')->nullable();
            $table->integer('ignore');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
