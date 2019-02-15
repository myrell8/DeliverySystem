<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [];

    public function deliverer()
    {
    	return $this->belongsTo(Deliverer::class);
    }
}
