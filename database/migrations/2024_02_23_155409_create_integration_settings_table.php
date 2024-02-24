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
        Schema::create('integration_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('integration_id')->nullable();
            $table->string('integration_setting_key',150)->nullable();
            $table->text('integration_setting_val')->nullable();
            $table->timestamps();
        });

        DB::table('integration_settings')->insert([
            ['tenant_id' => 1,'integration_id' => 1,'integration_setting_key' => 'active','integration_setting_val' => 'true'],
            ['tenant_id' => 1,'integration_id' => 1,'integration_setting_key' => 'teams_webhook','integration_setting_val' => ''],
            ['tenant_id' => 1,'integration_id' => 2,'integration_setting_key' => 'active','integration_setting_val' => 'true'],
            ['tenant_id' => 1,'integration_id' => 2,'integration_setting_key' => 'spryng_url','integration_setting_val' => 'https://rest.spryngsms.com/v1/messages?with%5B%5D=recipients'],
            ['tenant_id' => 1,'integration_id' => 2,'integration_setting_key' => 'spryng_token','integration_setting_val' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjIzMzgxYzlhYjY5NTY5MTQyZWRiMTI0ODI5YjJiMzlhMDY5OThiMTJiZDBhYjhjOGM4Nzc3NWQ5NGIzNTg2YzA3YWNlMTc2MDY4YjczMzUwIn0.eyJhdWQiOiIzIiwianRpIjoiMjMzODFjOWFiNjk1NjkxNDJlZGIxMjQ4MjliMmIzOWEwNjk5OGIxMmJkMGFiOGM4Yzg3Nzc1ZDk0YjM1ODZjMDdhY2UxNzYwNjhiNzMzNTAiLCJpYXQiOjE1NzMwMzU3MjcsIm5iZiI6MTU3MzAzNTcyNywiZXhwIjoxNjA0NjU4MTI3LCJzdWIiOiI2MDY1MSIsInNjb3BlcyI6W119.Drq3jnYp3n5_X-q7TPz8zsLJ583NUxI0x8X48XN41Y_crgwltwMgnXjkCWoFWQlOmFxRRlS6wbW28qcDSlJPjcDUXMTfWY4uquDvpu7DWNH46bHbFdWAz9lZ4XrvZVr5V-FkyYSQTWftS9zujAV7Huzz9WHLuqgcvK1yuJk07oA7CJMCGD1eeN_vQ3_dQVW0d5yiC7XBuD2-JdRkFXP_cf1ZOjTN8C9tD50pahjuukAEdwCU3c-qdcBRQwtNWdTZ1ESaA2fbsx-3RuwoF6w8uzg3W0qcAHuro_-GquV22Czdfir9F4V3GqS78dmx7Ws_JzqBSmUlQNEAP3tRyRnTIfa-N99wF174d6zL5H1NfJm7sGxX_GB4qRxOa3sfuQLj89iS6DpR0A2uJue8Of-vk2BIXfJSCbi72v91-rOPp1XTlljflwrOrxOSaSMxLOKKj59ZjdFUpkvpQ1S-nzZ_pgaMru7yKgFgBNBfBhTrx2Ct8GflG_N8LQL4_7cCwcPzswdCRcP0gvF0wBXYlAjL3pEq7Gcnbg5uEYinIbb7kL9hmZbDPs3PJqyuCs7yuBp3Cz_RG8tKvo-BH1_LFIY5iViiO_oD96QH_vZ6-lRh5ZVLk7FhZQ_I_R62yLcfN9NmXzWo4n2qI-Pw0qlNYs6bGYyBh40kUYdv-5pQ0Ko-jgQ'],
            ['tenant_id' => 1,'integration_id' => 2,'integration_setting_key' => 'spryng_route','integration_setting_val' => '1'],
            ['tenant_id' => 1,'integration_id' => 2,'integration_setting_key' => 'spryng_encoding','integration_setting_val' => 'unicode'],
            ['tenant_id' => 1,'integration_id' => 3,'integration_setting_key' => 'active','integration_setting_val' => 'true'],
            ['tenant_id' => 1,'integration_id' => 4,'integration_setting_key' => 'active','integration_setting_val' => 'true'],
            ['tenant_id' => 1,'integration_id' => 5,'integration_setting_key' => 'active','integration_setting_val' => 'true'],
            ['tenant_id' => 1,'integration_id' => 6,'integration_setting_key' => 'active','integration_setting_val' => 'true'],


        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integration_settings');
    }
};
