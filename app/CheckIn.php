<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    public function service()
    {
    	return $this->belongsTo(Service::class);
    }

    public function memberName()
    {
    	return $this->belongsTo(Member::class);
    }
}
