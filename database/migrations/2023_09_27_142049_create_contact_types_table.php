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
        Schema::create('contact_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('contact_type_name',100)->nullable();
            $table->string('contact_type_icon',150)->nullable();
            $table->string('contact_type_color',150)->nullable();
            $table->integer('contact_type_number')->nullable();
            $table->timestamps();
        });

        DB::table('contact_types')->insert([
            ['tenant_id' => 1, 'contact_type_name' => 'Normal', 'contact_type_icon' => 'user-tag', 'contact_type_color' => 'green', 'contact_type_number' => 1],
            ['tenant_id' => 1, 'contact_type_name' => 'Person', 'contact_type_icon' => 'user-large', 'contact_type_color' => 'blue', 'contact_type_number' => 100000],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_types');
    }
};
