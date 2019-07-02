<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public function parentFolder()
	{
		return $this->belongsTo(ImageFolder::class);
	}
}
