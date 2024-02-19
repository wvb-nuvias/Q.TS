<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: device_settings
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $rule
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class DeviceSetting extends Model
{
    use HasFactory;

    protected $casts = ['snmpproperties' => 'array'];

    protected $fillable = [
        'tenant_id',
        'device_id',
        'readonlyuser',
        'readonlypass',
        'readwriteuser',
        'readwritepass',
        'snmpproperties',
    ];
}
