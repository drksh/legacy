<?php namespace DarkShare;

use DarkShare\Submissions\Traits\TypeTrait;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel {

	public function setModelNameAttribute()
	{
		return strtolower(class_basename(self::class));
	}

}
