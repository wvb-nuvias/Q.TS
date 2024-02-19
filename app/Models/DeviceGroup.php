<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: device_groups
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $rule
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class DeviceGroup extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'name', 'rule'];
}
