<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Table: phones
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $phone_type_id
 * @property string|null $number
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Phone extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'phone_type_id', 'number'];

    /**
     * Get the contact of this phone.
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * Get the organization of this phone.
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Get the phonetype for this phone.
     */
    public function phonetype(): HasOne
    {
        return $this->HasOne(PhoneType::class);
    }
}
