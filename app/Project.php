<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'projects_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_name',
        'short_desc',
        'full_desc',
        'target_amount',
        'child_name',
        'slug',
        'user_id',
        'application_status'
    ];

    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function mainImage()
    {
        return $this->images()->where('main_img', '=', '1');
    }

}
