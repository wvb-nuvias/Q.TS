<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Brand;
use App\Models\Product;

/**
 * Table: product_types
*
* === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property int|null $brand_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
*/
class ProductType extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'name'];

    /**
     * Get the brand for this product_type.
     */
    public function brand(): HasOne
    {
        return $this->HasOne(Brand::class);
    }

    /**
     * Get the products that have this product_type.
     */
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
