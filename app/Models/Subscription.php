<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\SubscriptionsType;

/**
 * Table: subscriptions
*
* === Columns ===
 * @property int $id
 * @property int|null $tenantid
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $subscription_type_id
 * @property string|null $code
 * @property int|null $product_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $invoicetype
 * @property float|null $cost
 * @property string|null $subscriptionstart
 * @property string|null $subscriptionend
 * @property int|null $organisation_id
 * @property int|null $reseller_id
 * @property string|null $serial
 * @property int|null $brand_id
*/
class Subscription extends Model
{
    use HasFactory;

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
