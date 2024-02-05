<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Incident;

/**
 * Table: incident_details
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $incident_id
 * @property int|null $createdby
 * @property string|null $description
 * @property int|null $timespent
*/
class IncidentDetail extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'incident_id', 'createdby', 'description', 'timespent'];

    /**
     * Get the incident who has this incidentdetail.
     */
    public function incident(): BelongsTo
    {
        return $this->BelongsTo(Incident::class);
    }
}
