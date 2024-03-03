<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: jobs
 *
 * === Columns ===
 * @property int $id
 * @property string|null $language_code
 * @property string|null $language_name
 * @property string|null $language_flag
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Language extends Model
{
    use HasFactory;

    protected $fillable = ['language_code', 'language_name', 'language_flag'];
}
