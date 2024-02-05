<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Role;

/**
 * Table: rights
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $name
*/
class Right extends Model
{
    use HasFactory;

    /**
     * Get the roles that have this right.
     */
    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
