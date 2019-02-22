<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [];

    public function area()
    {
    	return $this->belongsTo(Area::class);
    }

    public function paper()
    {
    	return $this->belongsTo(Paper::class);
    }

    public function deliverer()
    {
    	return $this->belongsTo(Deliverer::class);
    }

    public function street()
    {
        return $this->hasMany(Street::class);
    }
}
