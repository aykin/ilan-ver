<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests;
use App\JobCategory;
use App\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobListingController extends Controller
{
    public $categories;

    /**
     * JobListingController constructor.
     */
    public function __construct()
    {
        $categories = JobCategory::all();

        $this->categories[0] = "Diğer";
        foreach ($categories AS $category) {
            $this->categories[$category->id] = $category->name;
        }
    }

    public function index() {
        $jobListings = JobListing::orderBy('created_at', 'desc')->get();
        return view('job-listings.index', ['categories' => $this->categories, 'jobListings' => $jobListings]);
    }

    /**
     * @param integer $jobListingId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($jobListingId) {
        if (Auth::check()) {
            $jobListing = JobListing::find($jobListingId);
        } else {
            $jobListing = JobListing::where('status',JobListing::STATUS_APPROVED)->findOrFail($jobListingId);
        }

        return view('job-listings.view', ['jobListing' => $jobListing]);
    }

    public function add() {
        return view('job-listings.add', ['categories' => $this->categories]);
    }

    /**
     * @param integer $jobListingId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($jobListingId) {
        $jobListing = JobListing::find($jobListingId);
        return view('job-listings.add', [
            'categories' => $this->categories,
            'jobListing' => $jobListing
        ]);
    }

    /**
     * Create a new Job Listing.
     *
     * @param  Request $request
     * @param int $jobListingId|null
     * @return Response
     */
    public function store(Request $request, $jobListingId = null)
    {
        $this->validate($request, [
            'company_name' => 'required|max:255',
            'company_website' => 'required|max:255',
            'name' => 'required|max:255',
            'company_location' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($jobListingId) {
            // Update
            $jobListing = JobListing::find($jobListingId);
            $company = $jobListing->company;
        } else {
            // Insert
            $jobListing = new JobListing();
            /* @todo $company seçilerek gelmeli, aynı formdan yapılmamalı */
            $company = new Company();
        }

        $company->name = $request->input('company_name');
        $company->website = $request->input('company_website');

        if ($request->file('company_logo')) {
            $logoPath = $request->file('company_logo')->store('company_logos');
            $company->logo = $logoPath;
        }

        $company->save();

        $jobListing->name = $request->input('name');
        $jobListing->job_category_id = $request->input('category')==0?null:$request->input('category');
        $jobListing->description = $request->input('description');
        $jobListing->location = $request->input('company_location');
        $jobListing->company_id = $company->id;
        $jobListing->status = 0;

        $jobListing->save();

        if ($jobListingId) {
            return redirect()->route('job-listing-view', ['jobListingId' => $jobListing->id]);
        } else {
            return view('job-listings.message');
        }

    }
}



