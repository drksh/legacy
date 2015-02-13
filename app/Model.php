<?php namespace DarkShare;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel {

	public function modelName()
	{
		return $this->table;
	}

}
