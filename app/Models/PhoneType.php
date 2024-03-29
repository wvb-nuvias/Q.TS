<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: phone_types
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property string|null $phone_type_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class PhoneType extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'phone_type_name'];

    /**
     * Get the phones that have this phonetype.
     */
    public function phones(): BelongsTo
    {
        return $this->belongsTo(Phone::class);
    }
}
