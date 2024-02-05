<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Organisation;

class OrganisationType extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'name'];

    /**
     * Get the organisations that have this organisationtype.
     */
    public function organisations(): BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }
}
