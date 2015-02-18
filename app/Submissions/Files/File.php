<?php namespace DarkShare\Submissions\Files;

use DarkShare\Model;
use DarkShare\Contracts\Models\Protectable;
use DarkShare\Submissions\Traits\HashPassword;
use DarkShare\Submissions\Traits\ProtectableTrait;

class File extends Model implements Protectable {

	use HashPassword;
	use ProtectableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'files';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

}
