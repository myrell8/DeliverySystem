<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyerlink extends Model
{
    protected $guarded = [];

    public function flyer()
    {
    	return $this->belongsTo(Flyer::class);
    }
}
