<?php namespace DarkShare\Submissions\Traits;

trait HashPassword {

	public function setPasswordAttribute($password)
	{
		if(empty($password))
			return;

		$this->attributes['password'] = bcrypt($password);
	}
}
