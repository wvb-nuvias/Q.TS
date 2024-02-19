<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceSetting extends Model
{
    use HasFactory;

    protected $casts = [
        'snmpproperties' => 'array'
    ];

    protected $fillable = [
        'tenant_id',
        'device_id',
        'readonlyuser',
        'readonlypass',
        'readwriteuser',
        'readwritepass',
        'snmpproperties',
    ];
}
