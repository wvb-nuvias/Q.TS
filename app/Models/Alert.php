<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: alerts
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property int $alert_rule_id
 * @property int $alert_status_id
 * @property string|null $message
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Alert extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'alert_rule_id', 'alert_status_id', 'message'];
}
