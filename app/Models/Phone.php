<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\PhoneType;

/**
 * Table: phones
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $phone_type_id
 * @property string|null $number
*/
class Phone extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'phone_type_id', 'number'];

    /**
     * Get the contact of this phone.
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * Get the customer of this phone.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the phonetype for this phone.
     */
    public function phonetype(): HasOne
    {
        return $this->HasOne(PhoneType::class);
    }
}
