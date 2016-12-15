<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests;
use App\JobListing;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return redirect(route('job-listings-index'));
    }

    /**
     * Create a new Job Listing.
     *
     * @param  Request $request
     * @return View
     */
    public function stats(Request $request)
    {
        $stats = [];
        $stats['jobListings_published'] = JobListing::where(['status' => JobListing::STATUS_APPROVED])->count();
        $stats['jobListings_pending'] = JobListing::where(['status' => JobListing::STATUS_PASSIVE])->count();
        $stats['jobListings_total'] = JobListing::count();

        return view('admin.stats')->with('stats', $stats);
    }
}



