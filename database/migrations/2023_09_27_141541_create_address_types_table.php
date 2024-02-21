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
        Schema::create('address_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('hidden')->nullable();
            $table->string('address_type_name',100)->nullable();
            $table->timestamps();
        });

        DB::table('address_types')->insert([
            ['tenant_id' => 1, 'hidden' => 1, 'address_type_name' => 'Creator'],
            ['tenant_id' => 1, 'hidden' => 0, 'address_type_name' => 'Home'],
            ['tenant_id' => 1, 'hidden' => 0, 'address_type_name' => 'Work'],
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
