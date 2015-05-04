<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documents_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

}
