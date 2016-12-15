@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Toplam İlan Sayısı</h3>
        </div>
        <div class="panel-body">
            {{ $stats['jobListings_total'] }}
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Yayındaki İlan Sayısı</h3>
        </div>
        <div class="panel-body">
            {{ $stats['jobListings_published'] }}
        </div>
    </div>

    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Bekleyen İlan Sayısı</h3>
        </div>
        <div class="panel-body">
            {{ $stats['jobListings_pending'] }}
        </div>
    </div>
@endsection('content')