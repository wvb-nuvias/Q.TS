<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: attachments
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property int|null $incident_id
 * @property int|null $subscription_id
 * @property string|null $attachment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Attachment extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'incident_id', 'subscription_id', 'attachment'];
}
