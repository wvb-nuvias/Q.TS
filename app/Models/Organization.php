<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Address;
use App\Models\User;
use App\Models\OrganizationType;
use App\Models\Email;
use App\Models\Phone;

/**
 * Table: organizations
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $number
 * @property int|null $organization_type_id
 * @property string|null $name
 * @property int|null $managedby
*/
class Organization extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'number', 'organization_type_id', 'name', 'managedby'];

    /**
     * Get the addresses for the organization.
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    /**
     * Get the users for the organization.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the organization type for this organization.
     */
    public function organization_type(): HasOne
    {
        return $this->HasOne(OrganizationType::class);
    }

    /**
     * Get the emails for the organization.
     */
    public function emails(): HasMany
    {
        return $this->hasMany(Email::class);
    }

    /**
     * Get the phones for the organization.
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
}
