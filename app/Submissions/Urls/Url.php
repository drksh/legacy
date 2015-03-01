<?php namespace DarkShare\Submissions\Urls;

use DarkShare\Contracts\Models\Protectable;
use DarkShare\Model;
use DarkShare\Submissions\Traits\HashPassword;
use DarkShare\Submissions\Traits\ProtectableTrait;

class Url extends Model implements Protectable {

	use HashPassword;
	use ProtectableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'urls';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'destination', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
}
