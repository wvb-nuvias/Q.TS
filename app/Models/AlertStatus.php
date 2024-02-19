<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: alert_statuses
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property string|null $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class AlertStatus extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'name'];
}
