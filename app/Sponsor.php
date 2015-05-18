<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model {

   protected $table = 'sponsors_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'top_sponsor',
        'business_name',
        'logo',
        'url',
        'online_since',
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
}

