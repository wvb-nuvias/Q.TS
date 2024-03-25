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
 * @property string|null $contact_type_name
 * @property string|null $contact_type_icon
 * @property string|null $contact_type_color
 * @property int|null $contact_type_number
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class ContactType extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'contact_type_name','contact_type_icon','contact_type_color','contact_type_number'];
}
