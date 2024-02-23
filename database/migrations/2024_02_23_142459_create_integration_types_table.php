<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('integration_types', function (Blueprint $table) {
            $table->id();
            $table->string('integration_type_name',150)->nullable();
            $table->string('integration_type_icon',150)->nullable();
            $table->string('integration_type_logo',150)->nullable();
            $table->string('integration_type_color',150)->nullable();
            $table->timestamps();
        });

        DB::table('integration_types')->insert([
            ['integration_type_name' => 'System','integration_type_icon' => 'gear','integration_type_logo' => '','integration_type_color' => 'emerald'],
            ['integration_type_name' => 'Data','integration_type_icon' => 'database','integration_type_logo' => '','integration_type_color' => 'orange'],
            ['integration_type_name' => 'Transport','integration_type_icon' => 'paper-plane','integration_type_logo' => '','integration_type_color' => 'blue'],
            ['integration_type_name' => 'Plugin','integration_type_icon' => 'plug','integration_type_logo' => '','integration_type_color' => 'green'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integration_types');
    }
};
