<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
    'name', 'email', 'password','lvluser','creatoruser',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function locais()
    {
        return $this->hasMany(locais::class);
    }

    public function eventos()
    {
        return $this->hasMany(eventos::class);
    }

    public function items()
    {
        return $this->hasMany(items::class);
    }

    const ADMIN = 'Admin';
    const CUser = 'Comum';

    public function Admin(){
        return $this->lvluser === self::ADMIN;
    }
}
