<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: brands
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $logo
 * @property string|null $color1
 * @property string|null $color2
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Brand extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'name', 'icon', 'logo', 'color1', 'color2'];

    /**
     * Get the products that have this brand.
     */
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the incidents that are about this brand.
     */
    public function incidents(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }
}
