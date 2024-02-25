<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\IntegrationType;
use App\Models\IntegrationSetting;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PowerComponents\LivewirePowerGrid\Components\Filters\Builders\Boolean;

/**
 * Table: integration
 *
 * === Columns ===
 * @property int $id *
 * @property string|null $integration_name
 * @property string|null $integration_icon
 * @property string|null $integration_logo
 * @property string|null $integration_color
 * @property integer|null $integration_type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Integration extends Model
{
    use HasFactory;

    protected $fillable = [
        'integration_name',
        'integration_icon',
        'integration_logo',
        'integration_color',
        'integration_type',
    ];

    /**
     * Get the tenants who have this integration
     */
    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class);
    }

    /**
     * Get the integration Type for this integration
     */
    public function integrationtype(): HasOne
    {
        return $this->hasOne(IntegrationType::class);
    }

    public function getsettings()
    {
        $user=auth()->user;
        $settings=IntegrationSetting::where('tenant_id',$user->tenant_id);

        return $settings;
    }

    public function getsetting($key)
    {
        //$user=auth()->user;
        $setting=IntegrationSetting::
            where('tenant_id',1)
            ->where('integration_id',$this->id)
            ->where('integration_setting_key',$key)->first();

        if ($setting) {
            return $setting->integration_setting_val;
        }

        return "";
    }

    public function isactive()
    {
        $active=$this->getsetting('active');

        if ($active->integration_setting_val) {
            return true;
        }
        return false;
    }

    function getbrand()
    {
        $icon=$this->integration_icon;

        if (str_contains($icon,'brand:'))
        {
            $id=intval(str_replace('brand:','',$icon));
            $brand=Brand::where('id',$id)->first();

            return $brand;
        }
    }
}
