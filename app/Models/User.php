<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use App\Models\Cook;
use App\Models\Dish;
use App\Models\Role;
use App\Models\Offer;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'role_id',
        'birth_date',
        'phone',
        'address',
        'municipality_id',
        'profile_img_url',
        'is_active',
        'about',
        'other',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cook()
    {
        return $this->hasOne(Cook::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }


    public function offers()
    {
        return $this->hasMany(Offer::class);
    }


    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->belongsToMany(Dish::class, 'comments');
    }

    public function createActivationCode()
    {
        $code = Str::random(20);
        $this->activation_code = $code;
        $this->activation_link_expiration = now()->addHours(24);
        $this->save();
        return $code;
    }


    public function isActivationLinkExpired()
    {
        $activationLinkCreatedAt = $this->activation_link_created_at;

        $expirationDateTime = Carbon::parse($activationLinkCreatedAt)->addMinutes(60);
        return $expirationDateTime->isPast();
    }


    public function activate()
    {
        $this->activation_link_expiration = null;
        $this->activation_code = null;
        $this->save();
    }

}
