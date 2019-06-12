<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $guarded = [];

    public function route()
    {
    	return $this->hasMany(Route::class);
    }
}
