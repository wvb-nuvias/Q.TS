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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->integer('product_type_id')->nullable();
            $table->integer('brand_id');
            $table->string('code',20)->nullable();
            $table->string('name',100)->nullable();
            $table->text('description')->nullable();
            $table->integer('unit_type_id')->nullable();
            $table->integer('units')->nullable();
            $table->float('cost', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
