<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Table: emails
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $email_type_id
 * @property string|null $address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Email extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'email_type_id', 'address'];

    /**
     * Get the email_type for this contact.
     */
    public function email_type(): HasOne
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
     * Get the organization who has this email.
     */
    public function organization(): BelongsTo
    {
        return $this->BelongsTo(Organization::class);
    }
}
