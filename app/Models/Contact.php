<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Table: contacts
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $customer_id
 * @property int|null $contact_type_id
 * @property int|null $job_id
 * @property string|null $lastname
 * @property string|null $firstname
 * @property string|null $language
 * @property string|null $source
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Contact extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'customer_id', 'contact_type_id', 'job_id', 'lastname', 'firstname','source'];

    /**
     * Get the addresses for the contact.
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get the contacttype for this contact.
     */
    public function contact_type(): HasOne
    {
        return $this->HasOne(ContactType::class);
    }

    /**
     * Get the customer for this contact.
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Get the emails for the contact.
     */
    public function emails(): HasMany
    {
        return $this->hasMany(Email::class);
    }

    /**
     * Get the job of this contact.
     */
    public function job(): HasOne
    {
        return $this->HasOne(Job::class);
    }

    /**
     * Get the phones for the contact.
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
}
