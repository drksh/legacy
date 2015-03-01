<?php namespace DarkShare\Submissions\Traits;

trait ProtectableTrait {

	/**
	 * Determine whether the model is password protected.
	 *
	 * @return bool
	 */
	private function isProtected()
	{
		return (is_null($this->password)) ? false : true;
	}

	/**
	 *
	 *
	 * @return bool
	 */
	private function isMine()
	{
		$userId = \Auth::id();

		if (is_null(\Auth::user()))
			return false;

		return $this->user_id == $userId;
	}

	/**
	 * @return bool
	 */
	public function userHasAccess()
	{
		if ( ! $this->isProtected())
			return true;

		// the file is mine and it's password protected
		if ($this->isMine() && $this->isProtected())
			return true;

		return false;
	}

	/**
	 * @param $password
	 * @return mixed
	 */
	public function authenticate($password)
	{
		return \Hash::check($password, $this->password);
	}


}
