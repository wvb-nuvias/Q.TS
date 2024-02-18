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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->string('name',100)->nullable();
            $table->string('icon',100)->nullable();
            $table->string('logo',100)->nullable();
            $table->string('color1',20)->nullable();
            $table->string('color2',20)->nullable();
            $table->timestamps();
        });

        DB::table('role_user')->insert([
            ['tenantid' => 1, 'name' => 'Watchguard', 'icon' => 'watchguard.png', 'logo' => 'watchguard.png', 'color1' => 'red-200', 'color2' => 'red-600'],
            ['tenantid' => 1, 'name' => 'Fortinet', 'icon' => 'fortinet.png', 'logo' => 'fortinet.png', 'color1' => 'orange-200', 'color2' => 'orange-600'],
            ['tenantid' => 1, 'name' => 'Trustwave', 'icon' => 'trustwave.png', 'logo' => 'trustwave.png', 'color1' => 'blue-200', 'color2' => 'blue-600'],
            ['tenantid' => 1, 'name' => 'Kaspersky', 'icon' => 'kaspersky.png', 'logo' => 'kaspersky.png', 'color1' => 'green-200', 'color2' => 'green-600'],
            ['tenantid' => 1, 'name' => 'Microsoft', 'icon' => 'microsoft.png', 'logo' => 'microsoft.png', 'color1' => 'amber-200', 'color2' => 'amber-600'],
            ['tenantid' => 1, 'name' => 'Deep Instinct', 'icon' => 'deep_instinct.png', 'logo' => 'deep_instinct.png', 'color1' => 'emerald-200', 'color2' => 'emerald-600'],
            ['tenantid' => 1, 'name' => 'ColorTokens', 'icon' => 'colortokens.png', 'logo' => 'colortokens.png', 'color1' => 'teal-200', 'color2' => 'teal-600'],
            ['tenantid' => 1, 'name' => 'TP Link', 'icon' => 'tplink.png', 'logo' => 'tplink.png', 'color1' => 'purple-200', 'color2' => 'purple-600'],
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
