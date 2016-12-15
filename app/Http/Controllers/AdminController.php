<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests;
use App\JobListing;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('job-listings.index');
    }

    /**
     * Create a new Job Listing.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }
}



