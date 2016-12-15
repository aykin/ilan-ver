<?php

namespace App;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JobListing extends Model
{
    const STATUS_PASSIVE = 0;
    const STATUS_APPROVED = 1;
    const STATUS_REMOVED = 2;


    use FormAccessible;

    protected $table = 'job_listings';

    protected $fillable = array('name', 'company_id', 'job_category_id', 'location', 'description');

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();
        if (!Auth::check()) {
            static::addGlobalScope('status', function (Builder $builder) {
                $builder->where('status', '=', self::STATUS_APPROVED);
            });
        }

    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function category()
    {
        return $this->belongsTo('App\JobCategory', 'job_category_id');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRemoved($query)
    {
        return $query->where('status', self::STATUS_REMOVED);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PASSIVE);
    }

    public function formCompanyNameAttribute()
    {
        return $this->company->name;
    }

    public function formCategoryAttribute()
    {
        if ($this->category) {
            return $this->category->id;
        } else {
            return 0;
        }

    }

    public function formCompanyWebsiteAttribute()
    {
        return $this->company->website;
    }

}
