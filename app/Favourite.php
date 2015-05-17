<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Favourite extends Model {

    protected $table = 'favorites_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'user_id'
    ];

    /**
     * Get the owner of this pledge.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the project that this pledge was made to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

//    public function alreadyFavourited($id)
//    {
//        if($this['project_id']::has($id))
//        {
//            return true;
//        }
//
//    }
}
