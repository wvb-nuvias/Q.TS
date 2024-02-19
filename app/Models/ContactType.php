<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: contact_types
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class ContactType extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'name'];
}
