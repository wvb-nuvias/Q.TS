<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: integration_type
 *
 * === Columns ===
 * @property int $id *
 * @property string|null $integration_type_name
 * @property string|null $integration_type_icon
 * @property string|null $integration_type_logo
 * @property string|null $integration_type_color
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class IntegrationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'integration_type_name',
        'integration_type_icon',
        'integration_type_logo',
        'integration_type_color',
    ];
}
