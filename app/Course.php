<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name',
        'topic',
        'address',
        'date',
        'time',
        'quota',
        'description',
    ];

    public function setNameAttribute($value)
    {
    	$this->attributes['name'] = $value;
    	
    	$this->attributes['slug'] = str_slug($value,'-');
    }

    public function setQuotaAttribute($value)
    {
        $this->attributes['quota'] = $value;

        $this->attributes['remaining'] = $value;
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function getFullDateAttribute()
    {
        return $this->attributes['date'].' '.$this->attributes['time'];
    }
}
