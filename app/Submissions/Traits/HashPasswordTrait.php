<?php namespace DarkShare\Submissions\Traits;

trait HashPasswordTrait {

	/**
	 * Always hash passwords
	 *
	 * @param $password
	 */
	public function setPasswordAttribute($password)
	{
		if(empty($password))
			return;

		$this->attributes['password'] = bcrypt($password);
	}
}
