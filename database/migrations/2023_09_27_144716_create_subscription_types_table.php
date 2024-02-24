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
        Schema::create('subscription_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('subscription_type_name',100)->nullable();
            $table->string('subscription_type_icon',150)->nullable();
            $table->string('subscription_type_color',150)->nullable();
            $table->timestamps();
        });

        DB::table('subscription_types')->insert([
            ['tenant_id' => 1, 'subscription_type_name' => 'Monthly', 'subscription_type_icon' => '', 'subscription_type_color' => ''],
            ['tenant_id' => 1, 'subscription_type_name' => 'Yearly', 'subscription_type_icon' => '', 'subscription_type_color' => ''],
            ['tenant_id' => 1, 'subscription_type_name' => '3 Months', 'subscription_type_icon' => '', 'subscription_type_color' => ''],
            ['tenant_id' => 1, 'subscription_type_name' => 'Managed Services', 'subscription_type_icon' => '', 'subscription_type_color' => ''],
            ['tenant_id' => 1, 'subscription_type_name' => 'Care Services', 'subscription_type_icon' => '', 'subscription_type_color' => ''],
            ['tenant_id' => 1, 'subscription_type_name' => 'NFR License', 'subscription_type_icon' => '', 'subscription_type_color' => ''],
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
