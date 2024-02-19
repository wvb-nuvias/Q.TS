<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: user_settings
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $user_id
 * @property string|null $key
 * @property string|null $val
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class UserSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['tenant_id', 'user_id', 'key', 'val'];
}
