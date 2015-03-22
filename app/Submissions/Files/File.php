<?php namespace DarkShare\Submissions\Files;

use DarkShare\Model;
use DarkShare\Contracts\Models\Protectable;
use DarkShare\Submissions\Traits\HashPasswordTrait;
use DarkShare\Submissions\Traits\ProtectableTrait;

class File extends Model implements Protectable {

	use HashPasswordTrait;
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
	protected $fillable = ['user_id', 'title', 'path', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password'];

	/**
	 * Define the relationship between a slug and it's file.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function slug() {
		return $this->hasOne(FileSlug::class);
	}

}
