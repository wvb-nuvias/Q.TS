<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: alerts
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property string|null $log_user_id
 * @property string|null $category
 * @property string|null $source
 * @property string|null $log_type
 * @property string|null $message
 * @property string|null $log_date *
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Log extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'log_user_id', 'category', 'source', 'log_type', 'message', 'log_date'];
}
