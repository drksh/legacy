<?php namespace DarkShare\Submissions\Snippets;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model {

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

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}

	public function getIsProtectedAttribute()
	{
		return ! is_null($this->password);
	}

}
