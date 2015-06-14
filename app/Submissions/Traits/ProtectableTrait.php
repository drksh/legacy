<?php namespace DarkShare\Submissions\Traits;

use Illuminate\Support\Facades\Auth;

trait ProtectableTrait {

	/**
	 * Determine whether the model is password protected.
	 *
	 * @return bool
	 */
	public function isProtected()
	{
		return (is_null($this->password)) ? false : true;
	}

	/**
     * Check whether submission belongs to the authenticated user
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
     * Check whether a user has access to the submission
     *
	 * @return bool
	 */
	public function userHasAccess()
	{
		if ( ! $this->isProtected())
			return true;

		if( Auth::user() && Auth::user()->isAdmin())
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
