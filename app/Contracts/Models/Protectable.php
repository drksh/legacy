<?php namespace DarkShare\Contracts\Models;

interface Protectable {

	/**
	 * Determine whether the model is password protected.
	 *
	 * @return bool
	 */
	public function isProtected();

}
