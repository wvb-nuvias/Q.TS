<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Subscription;

/**
 * Table: subscription_types
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $name
*/
class SubscriptionType extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'name'];

    /**
     * Get the subscriptions that have this subscriptiontype.
     */
    public function subscriptions(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
}
