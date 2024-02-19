<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Table: addresses
 *
 * === Columns ===
 * @property int $id
 * @property int $tenant_id
 * @property int|null $address_type_id
 * @property int|null $ordinal
 * @property string|null $street
 * @property string|null $number
 * @property string|null $apartment
 * @property string|null $postal
 * @property string|null $city
 * @property string|null $region
 * @property string|null $country
 * @property int|null $lat
 * @property int|null $lng
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Address extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = [
        'tenant_id',
        'address_type_id',
        'ordinal',
        'street',
        'number',
        'apartment',
        'postal',
        'city',
        'region',
        'country',
        'lat',
        'lng',
    ];

    /**
     * Get the addresstype for this address.
     */
    public function addresstype(): HasOne
    {
        return $this->hasOne(AddressType::class);
    }

    public function tostring()
    {
        $tmp=$this->street." ".$this->number;
        if ($this->appartement!=null) {
            $tmp.="/".$this->appartement;
        }
        $tmp.=", ".$this->postal." ".$this->city.", ";
        if ($this->region!=null) {
            $tmp.=$this->region." ";
        }
        $tmp.=$this->country;

        return $tmp;
    }

    public function updatelatlng()
    {
        $baseurl=config('mapquest.url')."?key=".config('mapquest.key')."&location=";
        $locationurlsafe=str_replace(" ","%20",$this->tostring());
        $url=$baseurl.$locationurlsafe;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);

        $resultobj=json_decode($result, true);

        $loc = $resultobj["results"][0]["locations"][0]["latLng"];

        $this->lat=$loc["lat"];
        $this->lng=$loc["lng"];
        $this->save();
    }
}
