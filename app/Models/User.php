<?php

namespace App\Models;

use App\Models\Admin\SocialMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use HasRoles;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'google_id',
        'phone',
    ];

    protected $dates = [
        'trial_until'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    function getSocialMedia(){
        return $this->hasOne(SocialMedia::class, 'user_id');
    }

    public function getPhotoAttribute(){
        return asset('storage/images/users').'/'.$this->profile_photo_path;
    }

    public function getFreeTrialDaysLeftAttribute()
    {
        // if ($this->plan_until) {
        //     return 0;
        // }

        return now()->diffInDays($this->trial_until, false);
    }

    public function getTimeTrialDaysLeftAttribute()
    {
        // if ($this->plan_until) {
        //     return 0;
        // }

        $days = now()->diffInDays($this->trial_until);
        $hours = now()->copy()->addDays($days)->diffInHours($this->trial_until);
        $minutes = now()->copy()->addDays($days)->addHours($hours)->diffInMinutes($this->trial_until);
        $seconds = now()->copy()->addDays($days)->addHours($hours)->addMinutes($minutes)->diffInSeconds($this->trial_until);

        return $days.' Days, '.$hours.' Hours '.$minutes.' Minutes '.$seconds.' Seconds';
    }
}
