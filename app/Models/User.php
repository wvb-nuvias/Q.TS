<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * Table: users
 *
 * === Columns ===
 * @property int $id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $email_verified_at
 * @property string|null $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property int|null $job_id
 * @property int|null $role_id
 * @property int|null $organization_id
 * @property string|null $firstname
 * @property string|null $phone
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'current_team_id',
        'profile_photo_path',
        'job_id',
        'role_id',
        'organization_id',
        'firstname',
        'phone',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ['profile_photo_url'];

    /**
     * Get the role of this user.
     */
    public function role(): HasOne
    {
        $role=$this->HasOne(Role::class, 'id', 'role_id');

        //dd($role->first());

        return $role;
    }

    /**
     * Get the role of this user.
     */
    public function job(): HasOne
    {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }

    /**
     * Get the tenant of this user.
     */
    public function tenant(): HasOne
    {
        return $this->hasOne(Tenant::class, 'id', 'tenant_id');
    }

    /**
     * Get the organization of this user.
     */
    public function organization(): HasOne
    {
        return $this->hasOne(organization::class, 'id', 'organization_id');
    }

    /**
     * Get the settings of this user.
     */
    public function settings(): HasMany
    {
        return $this->hasMany(UserSetting::class, 'user_id', 'id');
    }

    /**
     * Get a certain setting value for this user.
     */
    public function setting($key)
    {
        $setting=$this->settings()->where("key",$key)->first();
        if ($setting)
        {
            return $setting->val;
        }
        return null;
    }

    /**
     * Get the full name for this user.
     */
    public function getFullnameAttribute()
    {
        return "{$this->first_name} {$this->name}";
    }

    /**
     * Checks a certain right for this user. returns true/false
     */
    public function hasright($right)
    {
        $role=Role::where('id',$this->role_id)->first();
        $right=$role->rights()->where('code',$right)->first();

        if ($right)
        {
            return true;
        }
        return false;
    }

    /**
     * Gets the rights array for this user. returns array
     */
    public function rights()
    {
        $role=Role::where('id',$this->role_id)->first();
        $rights=$role->rights()->pluck('code')->toArray();

        if ($rights)
        {
            return $rights;
        }
        return array();
    }

    /**
     * Gets the rights array for this user. returns array
     */
    public function grouprights($group)
    {
        $role=Role::where('id',$this->role_id)->first();
        $rights=$role->rights()
            ->where('group',$group)
            ->pluck('code')
            ->toArray();
        if ($rights)
        {
            return $rights;
        }
        return array();
    }
}
