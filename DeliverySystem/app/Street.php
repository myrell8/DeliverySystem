<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $guarded = [];

    public function area()
    {
    	return $this->belongsTo(Area::class);
    }

    public function district()
    {
    	return $this->belongsTo(District::class);
    }

    public function address()
    {
    	return $this->hasMany(Address::class);
    }
}
