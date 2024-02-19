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
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $color
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class IncidentType extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'name', 'icon', 'color'];

    /**
     * Get the incidents that have this incident_type.
     */
    public function incidents(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }
}
