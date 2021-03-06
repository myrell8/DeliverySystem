<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $guarded = [];

    public function flyerlink()
    {
    	return $this->hasMany(Flyerlink::class);
    }
}
