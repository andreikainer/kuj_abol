<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Project extends Model {

    use SearchableTrait;

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

    protected $searchable = [
        'columns' => [
            'project_name'  => 10,
            'short_desc'    => 10,
            'full_desc'     => 10,
        ]
    ];

    /**
     * Get the documents that belong to this project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    /**
     * Get all images that belong to this project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * Get the main image only, that belongs to this project.
     *
     * @return mixed
     */
    public function mainImage()
    {
        return $this->images()->where('main_img', '=', '1');
    }

    /**
     * Get the secondary images only, that belong to this project.
     *
     * @return mixed
     */
    public function secondaryImages()
    {
        return $this->images()->where('main_img', '=', '0');
    }

    /**
     * Get the owner of this project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the pledges made to this project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function pledges()
    {
        return $this->hasManyThrough('App\Pledge', 'pledges_tbl');
    }

    /**
     * Get the favourites made to this project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function favourites()
    {
        return $this->hasManyThrough('App\Favourite', 'favorite_tbl');
    }

    /**
     * Format the target amount, before entering into DB.
     *
     * @param $value
     */
    protected function setTargetAmountAttribute($value)
    {
        $this->attributes['target_amount'] = preg_replace('/[,]/', '', $value);
    }

}
