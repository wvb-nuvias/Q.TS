<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\IncidentDetail;
use App\Models\IncidentStatus;
use App\Models\IncidentType;
use App\Models\Product;
use App\Models\Subscription;

/**
 * Table: incidents
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $createdby
 * @property int|null $customer_id
 * @property int|null $incident_type_id
 * @property int|null $incident_status_id
 * @property int|null $brand_id
 * @property int|null $product_id
 * @property int|null $subscription_id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $timespent
*/
class Incident extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'createdby', 'customer_id', 'incident_type_id', 'incident_status_id', 'brand_id', 'product_id', 'subscription_id', 'title', 'description', 'timespent'];

    /**
     * Get the brand for this incident.
     */
    public function brand(): HasOne
    {
        return $this->HasOne(Brand::class);
    }

    /**
     * Get the customer for this incident.
     */
    public function customer(): HasOne
    {
        return $this->HasOne(Customer::class);
    }

    /**
     * Get the incidentdetail for this incident.
     */
    public function incidentdetail(): HasMany
    {
        return $this->HasMany(IncidentDetail::class);
    }

    /**
     * Get the incidentstatus for this incident.
     */
    public function incidentstatus(): HasOne
    {
        return $this->HasOne(IncidentStatus::class);
    }

    /**
     * Get the incidenttype for this incident.
     */
    public function incidenttype(): HasOne
    {
        return $this->HasOne(IncidentType::class);
    }

    /**
     * Get the product for this incident.
     */
    public function product(): HasOne
    {
        return $this->HasOne(Product::class);
    }

    /**
     * Get the subscription for this incident.
     */
    public function subscription(): HasOne
    {
        return $this->HasOne(Subscription::class);
    }
}
