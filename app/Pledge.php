<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Pledge extends Model {

    protected $table = 'pledges_tbl';

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

    /**
     * Create an instance of Date object, when retrieving the created_at attribute.
     * Set its locale.
     *
     * @param $value
     * @return Date
     */
    protected function getCreatedAtAttribute($value)
    {
        $date = $this['created_at'] = Date::parse($value);

        $date->setLocale(LaravelLocalization::getCurrentLocale());

        $locale = LaravelLocalization::getCurrentLocale();

        if($locale == 'de')
        {
            return $date->format('j. F, Y');
        }
        else
        {
            return $date->format('jS F, Y');
        }
    }

    /**
     * Create an instance of a Date object, when retrieving the updated_at attribute.
     * Set its locale.
     *
     * @param $value
     * @return Date
     */
    protected function getUpdatedAtAttribute($value)
    {
        $date = $this['updated_at'] = Date::parse($value);

        $date->setLocale(LaravelLocalization::getCurrentLocale());

        $locale = LaravelLocalization::getCurrentLocale();

        if($locale == 'de')
        {
            return $date->format('j. F, Y');
        }
        else
        {
            return $date->format('jS F, Y');
        }
    }

    /**
     * Format the amount pledged to our requirements.
     *
     * @param $value
     * @return string
     */
    protected function getAmountAttribute($value)
    {
        return $this['amount'] = number_format($value, 2, ',', '.');
    }

}
