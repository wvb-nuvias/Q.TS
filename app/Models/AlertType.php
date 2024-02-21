<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: alert_types
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property string|null $alert_type_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class AlertType extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'alert_type_name'];
}
