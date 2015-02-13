<?php namespace DarkShare\Submissions\Snippets;

use DarkShare\Contracts\Models\Protectable;
use DarkShare\Model;
use Illuminate\Contracts\Auth\Guard;

class Snippet extends Model implements Protectable {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'snippets';

	/**
	 * The hidden attributed that should not be shown
	 *
	 * @var array
	 */
	protected $hidden = ['password'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'title', 'body', 'mode', 'password'];

	public function authenticate($password)
	{
		return \Hash::check($password, $this->password);
	}

	public function isProtected()
	{
		return ! is_null($this->password);
	}

	public function hasAccess()
	{
		$userId = \Auth::id();

		return $this->isProtected() && $this->user_id == $userId;
	}

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}

}
