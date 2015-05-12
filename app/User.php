<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_tbl';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'address',
        'business_name',
        'tel_number',
        'avatar',
        'email',
        'password',
        'active',
        'confirmation_code',
    ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Return the user, who matches the confirmation code.
     *
     * @param $query
     * @param $confirmation_code
     * @return mixed
     */
    public function scopeWhereConfirmationCode($query, $confirmation_code)
    {
        return $query->where('confirmation_code', '=', $confirmation_code)->first();
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function incompleteProject()
    {
        return $this->projects()->where('application_status', '=', '0');
    }

    public function currentLiveProject()
    {
        return $this->projects()
            ->where('live', '=', '1')
            ->where('application_status', '=', '1')
            ->where('approved', '=', '1');
    }

}
