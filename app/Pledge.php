<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model {

//    public function projects()
//    {
//        return $this->hasManyThrough('App\Project', 'App\User', 'pledger_id', '');
//    }

    protected $table = 'projects_tbl';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
