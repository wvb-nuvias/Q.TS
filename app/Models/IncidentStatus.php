<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: incident_statuses
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property string|null $incident_status_name
 * @property string|null $incident_status_icon
 * @property string|null $incident_status_color
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class IncidentStatus extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'incident_status_name', 'incident_status_icon', 'incident_status_color'];
}
