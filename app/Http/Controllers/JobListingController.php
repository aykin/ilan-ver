<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests;
use App\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index() {
        return view('job-listings.index');
    }

    public function add() {
        return view('job-listings.add');
    }

    /**
     * Create a new Job Listing.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company-name' => 'required|max:255',
            'company-url' => 'required|max:255',
            'job-listing-name' => 'required|max:255',
            'job-listing-location' => 'required|max:255',
        ]);

        /* @todo $company seçilerek gelmeli */
        $company = new Company();
        $company->name = $request->input('company-name');
        $company->website = $request->input('company-url');

        $company->save();

        $jobListing = new JobListing();

        $jobListing->name = $request->input('job-listing-name');
        $jobListing->job_category_id = $request->input('job-listing-category');
        $jobListing->description = $request->input('job-listing-description');
        $jobListing->location = $request->input('job-listing-location');
        $jobListing->company_id = $company->id;
        $jobListing->status = 0;

        $jobListing->save();
        return view('job-listings.index');
    }
}



