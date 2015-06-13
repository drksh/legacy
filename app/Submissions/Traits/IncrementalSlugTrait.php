<?php namespace DarkShare\Submissions\Traits;

use DarkShare\Contracts\Models\Sluggable;
use Illuminate\Support\Facades\App;

trait IncrementalSlugTrait {

    /**
     * Automatically slug submissions
     *
     * @param \DarkShare\Contracts\Models\Sluggable $sluggableModel
     * @return void
     */
    public function setSlugAttribute(Sluggable $sluggableModel) {

		$slugger = App::make('slugger');

		$this->attributes['slug'] = $slugger->make($sluggableModel->id);
	}

}
