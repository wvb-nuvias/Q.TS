<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Table: roles
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $hidden
 * @property string|null $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Role extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'hidden', 'name'];

    /**
     * Get the rights for the role.
     */
    public function rights(): BelongsToMany
    {
        return $this->belongsToMany(Right::class);
    }

    /**
     * Get the users that have this role.
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
