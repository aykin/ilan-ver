<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    public function jobListings()
    {
        return $this->hasMany('App\JobListing');
    }
}
