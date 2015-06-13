<?php namespace DarkShare\Submissions\Urls;

use DarkShare\Contracts\Models\Protectable;
use DarkShare\Contracts\Models\Sluggable;
use DarkShare\Model;
use DarkShare\Submissions\Traits\HashPasswordTrait;
use DarkShare\Submissions\Traits\ProtectableTrait;
use DarkShare\Users\User;

class Url extends Model implements Protectable, Sluggable {

	use HashPasswordTrait;
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

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function slug()
	{
		return $this->hasOne(UrlSlug::class);
	}

	public function url()
    {
        return 'http://drk.sh/' . $this->slug->slug;
    }
}
