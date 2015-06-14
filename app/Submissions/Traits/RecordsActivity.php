<?php namespace DarkShare\Submissions\Traits;

use DarkShare\Submissions\Analytics\Activity;

trait RecordsActivity {

    protected static function boot() {
        parent::boot();

        foreach(static::getModelEvents() as $event) {
            static::$event(function($subject) use ($event) {
                $subject->addModelEvent($event);
            });
        }

    }

    protected function getActivityName($subject, $action) {
        $name = class_basename($subject);
        $name = strtolower($name);

        return $action . '_' . $name;
    }

    protected function addModelEvent($event) {
        Activity::create([
          'subject_id'     => $this->id,
          'subject_type'   => get_class($this),
          'name'        => $this->getActivityName($this, $event),
          'user_id'     => \Auth::id(),
        ]);
    }

    protected static function getModelEvents() {
        if(isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return [
            'created', 'updated', 'deleted',
        ];
    }

}
