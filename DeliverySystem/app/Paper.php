<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $guarded = [];

    public function district()
    {
    	return $this->hasMany(District::class);
    }
}
