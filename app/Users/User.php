<?php namespace DarkShare\Users;

use DarkShare\Submissions\Snippets\Snippet;
use DarkShare\Submissions\Traits\HashPassword;
use DarkShare\Submissions\Urls\Url;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract {

	use Authenticatable;
	use HashPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Defines the relationship between a user and its snippets.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function snippets()
	{
		return $this->hasMany(Snippet::class);
	}

	/**
	 * Defines the relationship between a user and its urls.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function urls()
	{
		return $this->hasMany(Url::class);
	}

	public function ownsUrl(Url $url)
	{
		return $this->id == $url->user_id;
	}

}
