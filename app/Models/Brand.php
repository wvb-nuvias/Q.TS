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
 * @property string|null $brand_name
 * @property string|null $brand_icon
 * @property string|null $brand_logo
 * @property string|null $brand_color1
 * @property string|null $brand_color2
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Brand extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = ['tenant_id', 'brand_name', 'brand_icon', 'brand_logo', 'brand_color1', 'brand_color2'];

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
