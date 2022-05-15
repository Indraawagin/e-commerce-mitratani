<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
        'address',
        'provinces_id',
        'districts_id',
        'regencies_id',
        'zip_code',
        'country',
        'phone_number',

    ];

    public function province()
    {
        return $this->hasOne(Province::class, 'id', 'provinces_id');
    }

    public function district()
    {
        return $this->hasOne(District::class, 'id', 'districts_id');
    }

    public function regency()
    {
        return $this->hasOne(Regency::class, 'id', 'regencies_id');
    }

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
}
