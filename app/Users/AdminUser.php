<?php namespace Darkshare\Users;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model {

    /**
     * Defines the relationship, to see if user is in admin table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
