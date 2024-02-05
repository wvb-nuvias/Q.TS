<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Address;
use App\Models\User;
use App\Models\OrganisationType;
use App\Models\Email;
use App\Models\Phone;

/**
 * Table: organisations
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $number
 * @property int|null $organisation_type_id
 * @property string|null $name
 * @property int|null $managedby
*/
class Organisation extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'number', 'organisation_type_id', 'name', 'managedby'];

    /**
     * Get the addresses for the organisation.
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    /**
     * Get the users for the organisation.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the organisationtype for this organisation.
     */
    public function organisationtype(): HasOne
    {
        return $this->HasOne(OrganisationType::class);
    }

    /**
     * Get the emails for the organisation.
     */
    public function emails(): HasMany
    {
        return $this->hasMany(Email::class);
    }

    /**
     * Get the phones for the organisation.
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
}
