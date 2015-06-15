<?php namespace DarkShare\Submissions\Traits;

use DarkShare\Submissions\Analytics\Activity;

trait RecordsActivity {

    protected static function bootRecordsActivity() {

        foreach(static::getModelEvents() as $event) {
            static::$event(function($subject) use ($event) {
                $subject->recordActivity($event);
            });
        }

    }

    protected function getActivityName($subject, $action) {
        $name = class_basename($subject);
        $name = strtolower($name);

        return $action . '_' . $name;
    }

    public function recordActivity($event) {
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
