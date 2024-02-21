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
        Schema::create('organization_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('hidden')->nullable();
            $table->string('organization_type_name',100)->nullable();
            $table->timestamps();
        });

        DB::table('organization_types')->insert([
            ['tenant_id' => 1, 'hidden' => 1, 'organization_type_name' => 'Master'],
            ['tenant_id' => 1, 'hidden' => 0, 'organization_type_name' => 'Normal'],
            ['tenant_id' => 1, 'hidden' => 0, 'organization_type_name' => 'Prospect'],
            ['tenant_id' => 1, 'hidden' => 0, 'organization_type_name' => 'Reseller'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisation_types');
    }
};
