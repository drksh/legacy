<?php namespace DarkShare\Submissions\Traits;

trait HashPassword {

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}
}
