@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

    @include('errors.common')

        <form action="{{ URL::route('job-listing-store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="job-listing" class="col-sm-3 control-label">Şirket İsmi</label>

                <div class="col-sm-6">
                    <input type="text" name="company-name" id="job-listing-company" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="job-listing" class="col-sm-3 control-label">Şirket Logosu</label>

                <div class="col-sm-6">
                    <input type="file" name="company-logo" id="job-listing-company-logo" class="form-control">
                    <p class="help-block">1024x1024 den küçük olmalıdır</p>
                </div>
            </div>

            <div class="form-group">
                <label for="job-listing" class="col-sm-3 control-label">Şirket Web Adresi</label>

                <div class="col-sm-6">
                    <input type="text" name="company-url" id="job-listing-company-url" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="job-listing" class="col-sm-3 control-label">Şehir</label>

                <div class="col-sm-6">
                    <input type="text" name="job-listing-location" id="job-listing-location" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="job-listing" class="col-sm-3 control-label">İlan Başlığı</label>

                <div class="col-sm-6">
                    <input type="text" name="job-listing-name" id="job-listing-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="job-listing" class="col-sm-3 control-label">Kategori</label>

                <div class="col-sm-6">
                    <select  name="category" id="job-listing-category" class="form-control">
                        <option id="0">Diğer</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="job-listing" class="col-sm-3 control-label">Pozisyon Detayları</label>

                <div class="col-sm-6">
                    <textarea class="form-control" rows="5" name="job-listing-description"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> İlan Ekle
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection