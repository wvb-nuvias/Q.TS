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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->timestamps();
            $table->integer('number')->nullable();
            $table->integer('address_id')->nullable();
            $table->integer('organization_type_id')->nullable();
            $table->string('name',100)->nullable();
            $table->integer('managed_by')->nullable();
        });

        DB::table('organizations')->insert([
            ['tenant_id' => 1, 'number' => 1, 'organization_type_id' => 1, 'name' => 'the Q Continuum', 'managed_by' => 1, 'address_id' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
