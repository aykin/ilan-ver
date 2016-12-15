<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Quickstart - Basic</title>
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    @yield('head')

</head>

<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <p class="navbar-text"><a href="{{ route('job-listings-index') }}">Webrazzi Kariyer</a></p>
            <a href="{{ URL::route('job-listing-add-form') }}">
                <button type="button" class="btn btn-default navbar-btn">İlan Ver</button>
            </a>

        </div>
    </div>
</nav>

@if (Auth::check())
    <ul class="nav nav-pills">
        <li role="presentation" @if(Route::current()->getName() == 'job-listings-index-pending') class="active" @endif ><a href="{{ route('job-listings-index-pending') }}">Bekleyen İlanlar</a></li>
        <li role="presentation" @if(Route::current()->getName() == 'job-listings-index') class="active" @endif ><a href="{{ route('job-listings-index') }}">Yayında Olan İlanlar</a></li>
        <li role="presentation" @if(Route::current()->getName() == 'job-listings-index-removed') class="active" @endif ><a href="{{ route('job-listings-index-removed') }}">Yayından Kalkan İlanlar</a></li>
        <li role="presentation" @if(Route::current()->getName() == 'admin-stats') class="active" @endif ><a href="#">İstatistikler</a></li>
        <li role="presentation" @if(Route::current()->getName() == 'admin-users') class="active" @endif ><a href="#">Admin Kullanıcıları</a></li>
    </ul>
@endif

@yield('content')
</body>
</html>