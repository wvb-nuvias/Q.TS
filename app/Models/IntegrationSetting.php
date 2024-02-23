<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: integration_setting
 *
 * === Columns ===
 * @property int $id
 * @property integer|null $tenant_id
 * @property integer|null $integration_id
 * @property string|null $integration_setting_key
 * @property string|null $integration_setting_val
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class IntegrationSetting extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'integration_id', 'integration_setting_key', 'integration_setting_val'];
}
