<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename',
        'main_img',
        'project_id',
        'post_id'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

}
