<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Integration;

/**
 * Table: tenants
 *
 * === Columns ===
 * @property int $id
 * @property string|null $tenant_name
 * @property string|null $tenant_icon
 * @property string|null $tenant_logo
 * @property string|null $tenant_color
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Tenant extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_name', 'tenant_icon', 'tenant_logo', 'tenant_color'];

    /**
     * Get the integrations for this tenant
     */
    public function integrations(): HasMany
    {
        return $this->hasMany(Integration::class);
    }
}
