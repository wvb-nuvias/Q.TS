<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: alert_rules
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property int $device_group_id
 * @property string|null $content
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class AlertRule extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'device_group_id', 'content'];
}
