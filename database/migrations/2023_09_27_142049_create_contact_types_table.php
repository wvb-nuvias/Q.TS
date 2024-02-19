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
        Schema::create('contact_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('contact_types')->insert([
            ['tenant_id' => 1, 'name' => 'Normal'],
            ['tenant_id' => 1, 'name' => 'Person'],
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
