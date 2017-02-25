<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Crypt;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'social_auth', 'social_name', 'social_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getSocialTokenAttribute($value)
    {
        return Crypt::encrypt($value);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
