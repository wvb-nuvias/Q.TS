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
        Schema::create('phone_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('phone_type_name',100)->nullable();
            $table->timestamps();
        });

        DB::table('phone_types')->insert([
            ['tenant_id' => 1, 'phone_type_name' => 'Home'],
            ['tenant_id' => 1, 'phone_type_name' => 'Work'],
            ['tenant_id' => 1, 'phone_type_name' => 'Mobile Home'],
            ['tenant_id' => 1, 'phone_type_name' => 'Mobile Work'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_types');
    }
};
