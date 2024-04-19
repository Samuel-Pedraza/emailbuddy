<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
// Use this for Stripe
//use Laravel\Sanctum\HasApiTokens;
// Use this for LemonSqueezy
//use LemonSqueezy\Laravel\Billable;

// Use this for Paddle
use Laravel\Paddle\Billable;

class User extends Authenticatable implements FilamentUser
{
    use Billable;
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
        'name',
        'email',
        'password',
        'trial_is_used',
        'is_admin',
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
        'trial_is_used' => 'boolean',
        'is_admin' => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Relations
    public function socialAccounts(): HasMany
    {
        return $this->hasMany(SocialAccount::class);
    }

    // End Relations

    public function canAccessPanel(Panel $panel): bool
    {
        // Check if user can access panel,
        //        return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();

        return $this->is_admin;
    }

    public function trialIsUsed()
    {
        return $this->trial_is_used;
    }
}
