<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Table: subscriptions
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $subscription_type_id
 * @property string|null $code
 * @property int|null $product_id
 * @property string|null $name
 * @property string|null $description
 * @property float|null $cost
 * @property string|null $date_start
 * @property string|null $date_end
 * @property int|null $customer_id
 * @property int|null $reseller_id
 * @property string|null $serial
 * @property int|null $brand_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'subscription_type_id',
        'code',
        'product_id',
        'name',
        'description',
        'cost',
        'date_start',
        'date_end',
        'customer_id',
        'reseller_id',
        'serial',
        'brand_id',
    ];

    /**
     * Get the subscriptiontype for this product.
     */
    public function subscriptiontype(): HasOne
    {
        return $this->HasOne(SubscriptionType::class);
    }

    /**
     * Get the device linked to this subscription.
     */
    public function device()
    {
        return Device::where("serial",$this->serial)->first();
    }
}
