<?php namespace DarkShare\Submissions\Traits;

trait ProtectableTrait {

	public function isProtected()
	{
		return ! is_null($this->password);
	}

	public function authenticate($password)
	{
		return \Hash::check($password, $this->password);
	}

	public function hasAccess()
	{
		$userId = \Auth::id();

		return $this->isProtected() && $this->user_id == $userId;
	}

}
