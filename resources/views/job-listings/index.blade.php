@extends('layouts.app')

@section('content')
    @if (count($jobListings) > 0)
<table class="table">
    <tbody>
        @foreach ($jobListings AS $jobListing)
            <tr>
                @if (Auth::check())
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn-xs btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admin <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('job-listing-edit-form', ['jobListingId' => $jobListing->id] ) }}">Düzenle</a></li>
                                <li><a href="#">Sil</a></li>
                                <li><a href="#">Yayından Çek</a></li>
                            </ul>
                        </div>
                    </td>
                @endif
                <td>
                    <strong><a href="{{ route('job-listing-view', ['jobListingId' => $jobListing->id] ) }}">{{ $jobListing->name }}</a></strong>,
                    {{ $jobListing->location }},
                    <strong>{{ $jobListing->company->name }}</strong>
                    <span class="label label-primary" style="float:right">{{ $jobListing->category->name or 'Diğer'}}</span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    @endif

@endsection