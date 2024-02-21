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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('brand_name',100)->nullable();
            $table->string('brand_icon',100)->nullable();
            $table->string('brand_logo',100)->nullable();
            $table->string('brand_color1',20)->nullable();
            $table->string('brand_color2',20)->nullable();
            $table->timestamps();
        });

        DB::table('brands')->insert([
            ['tenant_id' => 1, 'brand_name' => 'Watchguard', 'brand_icon' => 'watchguard.png', 'brand_logo' => 'watchguard.png', 'brand_color1' => 'red-200', 'brand_color2' => 'red-600'],
            ['tenant_id' => 1, 'brand_name' => 'Fortinet', 'brand_icon' => 'fortinet.png', 'brand_logo' => 'fortinet.png', 'brand_color1' => 'orange-200', 'brand_color2' => 'orange-600'],
            ['tenant_id' => 1, 'brand_name' => 'Trustwave', 'brand_icon' => 'trustwave.png', 'brand_logo' => 'trustwave.png', 'brand_color1' => 'blue-200', 'brand_color2' => 'blue-600'],
            ['tenant_id' => 1, 'brand_name' => 'Kaspersky', 'brand_icon' => 'kaspersky.png', 'brand_logo' => 'kaspersky.png', 'brand_color1' => 'green-200', 'brand_color2' => 'green-600'],
            ['tenant_id' => 1, 'brand_name' => 'Microsoft', 'brand_icon' => 'microsoft.png', 'brand_logo' => 'microsoft.png', 'brand_color1' => 'amber-200', 'brand_color2' => 'amber-600'],
            ['tenant_id' => 1, 'brand_name' => 'Deep Instinct', 'brand_icon' => 'deep_instinct.png', 'brand_logo' => 'deep_instinct.png', 'brand_color1' => 'emerald-200', 'brand_color2' => 'emerald-600'],
            ['tenant_id' => 1, 'brand_name' => 'ColorTokens', 'brand_icon' => 'colortokens.png', 'brand_logo' => 'colortokens.png', 'brand_color1' => 'teal-200', 'brand_color2' => 'teal-600'],
            ['tenant_id' => 1, 'brand_name' => 'TP Link', 'brand_icon' => 'tplink.png', 'brand_logo' => 'tplink.png', 'brand_color1' => 'purple-200', 'brand_color2' => 'purple-600'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
