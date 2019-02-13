<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function street()
    {
    	return $this->belongsTo(Street::class);
    }
}
