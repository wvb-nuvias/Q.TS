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
        Schema::create('address_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->integer('hidden');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('address_types')->insert([
            ['tenant_id' => 1, 'hidden' => 1, 'name' => 'Creator'],
            ['tenant_id' => 1, 'hidden' => 0, 'name' => 'Home'],
            ['tenant_id' => 1, 'hidden' => 0, 'name' => 'Work'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_types');
    }
};
