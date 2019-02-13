<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = [];

    public function streets()
    {
    	return $this->hasMany(Street::class);
    }
}
