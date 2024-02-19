<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: rights
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $group
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Right extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'name', 'code', 'group'];

    /**
     * Get the roles that have this right.
     */
    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
