<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Table: devices
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenantid
 * @property string|null $hostname
 * @property string|null $ip
 * @property string|null $sysname
 * @property string|null $sysdesc
 * @property string|null $syscontact
 * @property string|null $sysos
 * @property string|null $sysversion
 * @property int|null $devicetype_id
 * @property int|null $brand_id
 * @property string|null $hardware
 * @property string|null $serial
 * @property int|null $address_id
 * @property string|null $image
 * @property string|null $icon
 * @property string|null $notes
 * @property int|null $ignore
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Device extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = [
        'tenantid',
        'hostname',
        'ip',
        'sysname',
        'sysdesc',
        'syscontact',
        'sysos',
        'sysversion',
        'devicetype_id',
        'brand_id',
        'hardware',
        'serial',
        'addressid',
        'image',
        'icon',
        'notes',
        'ignore',
    ];

    /**
     * Get the address for the device.
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Get the type for the device.
     */
    public function type(): HasOne
    {
        return $this->hasOne(DeviceType::class);
    }

    /**
     * Get the groups for the device.
     */
    public function groups(): HasMany
    {
        return $this->hasMany(DeviceGroup::class);
    }

    /**
     * Get the brand for this device.
     */
    public function brand(): HasOne
    {
        return $this->HasOne(Brand::class);
    }

    /**
     * Get the subscription for this device.
     */
    public function subscription()
    {
        return Subscription::where("serial",$this->serial)->first();
    }

    /**
     * Get the settings for this device.
     */
    public function settings()
    {
        return DeviceSetting::where("device_id",$this->id)->first();
    }
}
