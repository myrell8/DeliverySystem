<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliverer extends Model
{
    protected $guarded = [];

    protected $dates = ['bonus_timer'];

    public function district()
    {
    	return $this->hasMany(District::class);
    }
}
