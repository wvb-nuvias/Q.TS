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
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->integer('number')->nullable();
            $table->integer('address_id')->nullable();
            $table->integer('organisation_type_id')->nullable();
            $table->string('name',100)->nullable();
            $table->integer('managedby')->nullable();
        });

        //add q continuum as organisation?
        DB::table('organisations')->insert([
            ['tenantid' => 1, 'number' => 1, 'organisation_type_id' => 1, 'name' => 'the Q Continuum', 'managedby' => 1, 'address_id' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisations');
    }
};
