<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: incident_statuses
*
* === Columns ===
 * @property int $id
 * @property int $tenantid
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $color
*/
class IncidentSeverity extends Model
{
    use HasFactory;

    protected $fillable = ['tenantid', 'name', 'icon', 'color'];
}
