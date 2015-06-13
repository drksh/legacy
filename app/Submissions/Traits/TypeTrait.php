<?php namespace DarkShare\Submissions\Traits;

trait TypeTrait {

    public function subFlac() {
        return strtolower(class_basename(self::class));
    }
}
