<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'ville',
        'adresse',
        'telephone',
        'image',
        'isadmin',
        'code_cin',
        'role_id',
        
    ];
    public function getProfileImagePathAttribute()
{
    return $this->image ? asset('storage/profile_images/' . $this->image) : asset('default_profile.png');
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
        'password' => 'hashed',
    ];
    //les relations 
public function role()
{
    return $this->belongsTo(Role::class);
}

public function emprunts()
{
    return $this->hasMany(Emprunt::class);
}

public function reservations()
{
    return $this->hasMany(Reservation::class);
}



}
