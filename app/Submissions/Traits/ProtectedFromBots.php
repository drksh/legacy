<?php namespace DarkShare\Submissions\Traits;

use Carbon\Carbon;
use DarkShare\Exceptions\TooManySubmissionsException;
use DarkShare\Services\DarkShare;
use DarkShare\Submissions\Analytics\Activity;

trait ProtectedFromBots {

    /**
     * Protect from bots at an IP point of view
     */
    protected static function bootProtectedFromBots() {

        static::creating(function($subject) {
            $subject->protectFromBots();
        });

    }

    /**
     * Check activity if an IP and determine if it should get blocked
     */
    protected function protectFromBots() {
        $userIP = app()->request->getClientIp();

        $todayStart = (new Carbon('now'))->startOfDay();
        $todayEnd   = (new Carbon('now'))->endOfDay();

        $activityCount = Activity::whereIp($userIP)
            ->whereBetween('created_at', [$todayStart, $todayEnd])
            ->count();

        if($activityCount >= Darkshare::$maxPerIp) {
            $this->blockSubmission();
        }
    }

    /**
     * Thow an exception when max IP limit is reached
     *
     * @throws TooManySubmissionsException
     */
    protected function blockSubmission() {
        $message = "You've reached your daily limit, sorry.";
        throw new TooManySubmissionsException($message);
    }
}
