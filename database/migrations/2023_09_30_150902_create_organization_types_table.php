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
            $table->string('organization_type_icon',150)->nullable();
            $table->string('organization_type_color',150)->nullable();
            $table->integer('organization_type_number')->nullable();
            $table->timestamps();
        });

        DB::table('organization_types')->insert([
            ['tenant_id' => 1, 'hidden' => 1, 'organization_type_name' => 'Master', 'organization_type_icon' => 'hotel', 'organization_type_color' => 'red' ,'organization_type_number' => 10000],
            ['tenant_id' => 1, 'hidden' => 0, 'organization_type_name' => 'Prospect', 'organization_type_icon' => 'tents', 'organization_type_color' => 'blue' ,'organization_type_number' => 20000],
            ['tenant_id' => 1, 'hidden' => 0, 'organization_type_name' => 'Customer', 'organization_type_icon' => 'building', 'organization_type_color' => 'green' ,'organization_type_number' => 30000],
            ['tenant_id' => 1, 'hidden' => 0, 'organization_type_name' => 'Reseller', 'organization_type_icon' => 'tent-arrow-turn-left', 'organization_type_color' => 'amber' ,'organization_type_number' => 40000],
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
