<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = [
		'title',
		'summary',
		'address',
		'date',
		'time',
		'quota',
		'description'
	];

	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
		
		$this->attributes['slug'] = str_slug($value,'-');
	}

	public function setQuotaAttribute($value)
	{
		$this->attributes['quota'] = $value;

		$this->attributes['remaining'] = $value;
	}

	public function getCostAttribute()
	{
		return $this->attributes['cost'] / 100;
	}

	public function getCostCentAttribute()
	{
		return $this->attributes['cost'];
	}

	public function bookmarks()
	{
		return $this->hasMany(Bookmark::class);
	}

	public function getFullDateAttribute()
	{
		return $this->attributes['date'].' '.$this->attributes['time'];
	}

	public function type()
	{
		return $this->belongsTo(Type::class);
	}

	public function topic()
	{
		return $this->belongsTo(Topic::class);
	}

	public function owner()
	{
		return $this->belongsTo(User::class);
	}
}
