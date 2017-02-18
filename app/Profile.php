<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = [
        'user_id', 'from', 'from_name', 'phone',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
