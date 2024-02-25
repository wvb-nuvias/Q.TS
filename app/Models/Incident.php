<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Table: incidents
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $incident_nr
 * @property int|null $created_by
 * @property int|null $customer_id
 * @property int|null $incident_type_id
 * @property int|null $incident_status_id
 * @property int|null $brand_id
 * @property int|null $product_id
 * @property int|null $subscription_id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $time_spent
 * @property string|null $incident_source
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Incident extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = [
        'tenant_id',
        'incident_nr',
        'created_by',
        'customer_id',
        'incident_type_id',
        'incident_status_id',
        'brand_id',
        'product_id',
        'subscription_id',
        'title',
        'description',
        'time_spent',
        'incident_source',
    ];

    /**
     * Get the brand for this incident.
     */
    public function brand(): HasOne
    {
        return $this->HasOne(Brand::class);
    }

    /**
     * Get the organization for this incident.
     */
    public function organization(): HasOne
    {
        return $this->HasOne(organization::class);
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
