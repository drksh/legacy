<?php namespace DarkShare\Submissions\Files;

use DarkShare\Model;
use DarkShare\Submissions\Traits\IncrementalSlugTrait;

class FileSlug extends Model {

	use IncrementalSlugTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'file_slugs';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['file_id', 'slug'];

	/**
	 * Defines the relationship between a slug and it's snippet.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function file()
	{
		return $this->belongsTo(File::class);
	}
}
