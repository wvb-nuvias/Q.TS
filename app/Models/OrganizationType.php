<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: organizations
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $hidden
 * @property string|null $organization_type_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class OrganizationType extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'hidden', 'organization_type_name'];

    /**
     * Get the organizations that have this organizationtype.
     */
    public function organizations(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
