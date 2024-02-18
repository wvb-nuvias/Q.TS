<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'firstname',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the role of this user.
     */
    public function role(): HasOne
    {
        return $this->HasOne(Role::class, 'id', 'role_id');
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
        return $this->hasOne(Tenant::class, 'id', 'tenantid');
    }

    /**
     * Get the organisation of this user.
     */
    public function organisation(): HasOne
    {
        return $this->hasOne(Organisation::class, 'id', 'organisation_id');
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
    public function fullname() {
        return $this->firstname." ".$this->name;
    }

    /**
     * Checks a certain right for this user. returns true/false
     */
    public function hasright($right)
    {
        $right=$this->role()->rights()->where('code',$right)->first();

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
        return null;
    }

    /**
     * Gets the rights array for this user. returns array
     */
    public function grouprights($group)
    {
        $rights=$this->role()->rights()
            ->where('group',$group)
            ->get()
            ->toArray();
        if ($rights)
        {
            return $rights;
        }
        return null;
    }
}
