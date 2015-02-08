<?php namespace MediShare\Submissions\Snippets;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'snippets';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'title', 'body', 'password'];

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = mcrypt($password);
	}

}
