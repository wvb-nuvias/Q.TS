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
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('product_type_name',100)->nullable();
            $table->integer('brand_id')->nullable();
            $table->timestamps();
        });

        DB::table('product_types')->insert([
            ['tenant_id' => 1, 'product_type_name' => 'Service'],
            ['tenant_id' => 1, 'product_type_name' => 'Development'],
            ['tenant_id' => 1, 'product_type_name' => 'Device'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_types');
    }
};
