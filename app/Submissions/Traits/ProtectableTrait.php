<?php namespace DarkShare\Submissions\Traits;

trait ProtectableTrait {

	protected function isProtected()
	{
		return ! is_null($this->password);
	}

}
