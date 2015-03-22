<?php namespace DarkShare\Submissions\Snippets;

use DarkShare\Model;
use DarkShare\Submissions\Traits\IncrementalSlugTrait;

class SnippetSlug extends Model {

	use IncrementalSlugTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'snippet_slugs';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['snippet_id', 'slug'];

	/**
	 * Defines the relationship between a slug and it's snippet.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function snippet()
	{
		return $this->belongsTo(Snippet::class);
	}
}
