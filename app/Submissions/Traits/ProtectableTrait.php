<?php namespace DarkShare\Submissions\Traits;

trait ProtectableTrait {

	private function isProtected()
	{
		return (is_null($this->password)) ? false : true;
	}

	private function isMine()
	{
		$userId = \Auth::id();

		if (is_null(\Auth::user()))
			return false;

		return $this->user_id == $userId;
	}

	public function userHasAccess()
	{
		if ( ! $this->isProtected())
			return true;

		// the file is mine and it's password protected
		if ($this->isMine() && $this->isProtected())
			return true;

		return false;
	}

	public function authenticate($password)
	{
		return \Hash::check($password, $this->password);
	}


}
