<?php namespace DarkShare\Users;

use DarkShare\Model;
use DarkShare\Submissions\Files\File;
use DarkShare\Submissions\Snippets\Snippet;
use DarkShare\Submissions\Traits\HashPasswordTrait;
use DarkShare\Submissions\Traits\RecordsActivity;
use DarkShare\Submissions\Urls\Url;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract {

    use Authenticatable;
    use HashPasswordTrait;
    use RecordsActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Defines the relationship between a user and its snippets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function snippets()
    {
        return $this->hasMany(Snippet::class)->with('slug')->latest();
    }

    /**
     * Defines the relationship between a user and its files
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(File::class)->with('slug')->latest();
    }

    /**
     * Defines the relationship between a user and its urls.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function urls()
    {
        return $this->hasMany(Url::class)->with('slug')->latest();
    }

    /**
     * Determine whether current user is an admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        $isInAdmin = AdminUser::where('user_id', $this->id)->first();

        return ! is_null($isInAdmin);
    }

    /**
     * Define whether a user owns a URL or not
     *
     * @param \DarkShare\Submissions\Urls\Url $url
     * @return bool
     */
    public function ownsUrl(Url $url)
    {
        return $this->id == $url->user_id;
    }

}
