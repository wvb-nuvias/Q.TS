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
        Schema::create('subscription_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('subscription_types')->insert([
            ['tenantid' => 1, 'name' => 'Monthly'],
            ['tenantid' => 1, 'name' => 'Yearly'],
            ['tenantid' => 1, 'name' => '3 Months'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_types');
    }
};
