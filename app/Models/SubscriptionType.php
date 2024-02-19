<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: subscription_types
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class SubscriptionType extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'name'];

    /**
     * Get the subscriptions that have this subscription_type.
     */
    public function subscriptions(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
}
