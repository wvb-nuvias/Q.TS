<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Address;
use App\Models\Contact;
use App\Models\CustomerType;
use App\Models\Email;
use App\Models\Phone;

/**
 * Table: customers
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $number
 * @property int|null $customer_type_id
 * @property string|null $name
 * @property int|null $managedby
*/
class Customer extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'number', 'customer_type_id', 'name', 'managedby'];

    /**
     * Get the addresses for the customer.
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get the contacts for the customer.
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Get the customertype for this customer.
     */
    public function customertype(): HasOne
    {
        return $this->HasOne(CustomerType::class);
    }

    /**
     * Get the emails for the customer.
     */
    public function emails(): HasMany
    {
        return $this->hasMany(Email::class);
    }

    /**
     * Get the phones for the customer.
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
}
