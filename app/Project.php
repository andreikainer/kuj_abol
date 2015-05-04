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

}
