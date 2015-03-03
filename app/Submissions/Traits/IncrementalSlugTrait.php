<?php namespace DarkShare\Submissions\Traits;

use DarkShare\Contracts\Models\Sluggable;
use DarkShare\Services\Slugger;

trait IncrementalSlugTrait {

	public function setSlugAttribute(Sluggable $sluggableModel) {

		$slugger = new Slugger();

		$this->attributes['slug'] = $slugger->make($sluggableModel->id);
	}

}
