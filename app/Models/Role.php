<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Right;
use App\Models\User;

/**
 * Table: roles
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $name
*/
class Role extends Model
{
    use HasFactory;

    /**
     * Get the rights for the role.
     */
    public function rights(): HasMany
    {
        return $this->hasMany(Right::class);
    }

    /**
     * Get the users that have this role.
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
