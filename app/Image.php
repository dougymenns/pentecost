<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Image extends Model
{
	public function parentFolder()
	{
		return $this->belongsTo(ImageFolder::class);
	}

	use Resizable;
}
