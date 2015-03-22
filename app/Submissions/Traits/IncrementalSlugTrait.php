<?php namespace DarkShare\Submissions\Traits;

use DarkShare\Contracts\Models\Sluggable;
use DarkShare\Services\Slugger;
use Illuminate\Support\Facades\App;

trait IncrementalSlugTrait {

	public function setSlugAttribute(Sluggable $sluggableModel) {

		$slugger = App::make('slugger');

		$this->attributes['slug'] = $slugger->make($sluggableModel->id);
	}

}
