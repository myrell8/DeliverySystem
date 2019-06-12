<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $guarded = [];

    public function courier()
    {
    	return $this->belongsTo(Courier::class);
    }

    public function district()
    {
    	return $this->hasMany(District::class);
    }
}
