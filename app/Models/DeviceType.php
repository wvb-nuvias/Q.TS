<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: device_types
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property string|null $device_type_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class DeviceType extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'device_type_name'];
}
