<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: jobs
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property string|null $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Job extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'name'];

    /**
     * Get the contacts who have this job.
     */
    public function contacts(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
