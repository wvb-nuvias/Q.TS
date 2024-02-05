<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\Brand;
use App\Models\ProductType;
use App\Models\UnitType;

/**
 * Table: products
*
* === Columns ===
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $product_type_id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $description
 * @property int|null $unit_type_id
 * @property int|null $units
 * @property float|null $cost
 * @property int $brand_id
*/
class Product extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'product_type_id', 'code', 'name', 'description', 'unit_type_id', 'units', 'cost'];

    /**
     * Get the brand for this product.
     */
    public function brand(): HasOne
    {
        return $this->HasOne(Brand::class);
    }

    /**
     * Get the producttype for this product.
     */
    public function producttype(): HasOne
    {
        return $this->HasOne(ProductType::class);
    }

    /**
     * Get the unittype for this product.
     */
    public function unittype(): HasOne
    {
        return $this->HasOne(UnitType::class);
    }
}
