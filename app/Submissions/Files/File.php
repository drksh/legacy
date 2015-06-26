<?php namespace DarkShare\Submissions\Files;

use DarkShare\Contracts\Models\Sluggable;
use DarkShare\Model;
use DarkShare\Contracts\Models\Protectable;
use DarkShare\Submissions\Traits\HashPasswordTrait;
use DarkShare\Submissions\Traits\ProtectableTrait;
use DarkShare\Submissions\Traits\ProtectedFromBots;
use DarkShare\Submissions\Traits\RecordsActivity;
use DarkShare\Users\User;

class File extends Model implements Protectable, Sluggable {

	use HashPasswordTrait;
	use ProtectableTrait;
	use RecordsActivity;
	use ProtectedFromBots;

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
	 * Define the relationship between a slug and its file.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function slug() {
		return $this->hasOne(FileSlug::class);
	}

    /**
     * Define the relationship between a user and its file.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function user() {
	    return $this->belongsTo(User::class);
	}

}
