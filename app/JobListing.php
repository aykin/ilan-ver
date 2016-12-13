<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $table = 'job_listings';

    protected $fillable = array('company_id','job_category_id','location','description');

    public $timestamps = true;

    public function Company()
    {
        return $this->belongsTo('Company','company_id');
    }

    public function Category()
    {
        return $this->belongsTo('Category','category_id');
    }
}
