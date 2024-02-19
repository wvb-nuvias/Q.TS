<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: incident_details
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $incident_nr
 * @property int|null $created_by
 * @property string|null $description
 * @property int|null $time_spent
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class IncidentDetail extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'incident_nr', 'incident_id', 'created_by', 'description', 'time_spent'];

    /**
     * Get the incident who has this incidentdetail.
     */
    public function incident(): BelongsTo
    {
        return $this->BelongsTo(Incident::class);
    }
}
