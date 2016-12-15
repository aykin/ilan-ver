@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div style="float:right">
                <img height="120" src="{{ asset($jobListing->company->logo) }}">
            </div>
            <div class="page-header">
                <h1>{{ $jobListing->name }}<br><small>{{ $jobListing->company->name }}</small></h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <strong>Şehir: </strong> {{ $jobListing->location }}<br>
                    <strong>Şirket Web Adresi: </strong> {{ $jobListing->company->website }}<br>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Pozisyon Detayları</h3>
                </div>
                <div class="panel-body">
                    {!! $jobListing->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection('content')