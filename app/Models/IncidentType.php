<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: incident_types
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property string|null $incident_type_name
 * @property string|null $incident_type_icon
 * @property string|null $incident_type_color
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class IncidentType extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'incident_type_name', 'incident_type_icon', 'incident_type_color'];

    /**
     * Get the incidents that have this incident_type.
     */
    public function incidents(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }
}
