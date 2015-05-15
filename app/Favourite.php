<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model {

    protected $table = 'favorites_tbl';

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
}
