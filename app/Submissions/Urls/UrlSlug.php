<?php namespace DarkShare\Submissions\Urls;

use DarkShare\Model;
use DarkShare\Submissions\Traits\IncrementalSlugTrait;

class UrlSlug extends Model {

	use IncrementalSlugTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'url_slugs';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['url_id', 'slug'];

}
