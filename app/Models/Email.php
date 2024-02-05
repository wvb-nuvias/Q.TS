<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\EmailType;
use App\Models\Contact;
use App\Models\Customer;

/**
 * Table: emails
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $email_type_id
 * @property string|null $address
*/
class Email extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'email_type_id', 'address'];

    /**
     * Get the emailtype for this contact.
     */
    public function emailtype(): HasOne
    {
        return $this->HasOne(EmailType::class);
    }

    /**
     * Get the contact who has this email.
     */
    public function contact(): BelongsTo
    {
        return $this->BelongsTo(Contact::class);
    }

    /**
     * Get the customer who has this email.
     */
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }
}
