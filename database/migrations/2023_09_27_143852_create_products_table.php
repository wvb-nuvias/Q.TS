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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('product_type_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('code',20)->nullable();
            $table->string('name',100)->nullable();
            $table->text('description')->nullable();
            $table->integer('unit_type_id')->nullable();
            $table->integer('units')->nullable();
            $table->float('cost', 8, 2)->nullable();
            $table->timestamps();
        });

        DB::table('subscription_types')->insert([
            ['tenant_id' => 1, 'product_type_id' => 1, 'brand_id' => 0, 'code' => 'NFR-0', 'name' => 'Endless NFR License', 'description' => 'Endless NFR License','init_type_id' => 3,'units' => 1, 'cost' => 0],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
