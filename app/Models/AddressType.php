<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: address_types
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property int $hidden
 * @property string|null $address_type_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class AddressType extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'hidden', 'address_type_name'];

    /**
     * Get the addresses that have this address_type.
     */
    public function addresses(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
