@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

    @include('errors.common')

        {!! Form::macro('styledInput', function($name, $description)
        {
            return '<div class="form-group">'.
                Form::label($name, $description, array('class' => 'col-sm-3 control-label')).
                '<div class="col-sm-6">'.
                    Form::text($name, null, array('class' => 'form-control')).
                '</div>
            </div>';
        }) !!}

        @if( isset($jobListing) )
            {{ Form::model($jobListing, ['route' => ['job-listing-edit-store', $jobListing], 'files' => true, 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
        @else
            {{ Form::open(['url' => url()->current(), 'files' => true, 'class' => 'form-horizontal'] )}}
        @endif

            {!! Form::styledInput('company_name','Şirket İsmi') !!}

            <div class="form-group">
                {{ Form::label('company_logo', 'Şirket Logosu', array('class' => 'col-sm-3 control-label')) }}

                <div class="col-sm-6">
                    <input type="file" name="company_logo" id="job-listing-company-logo" class="form-control">
                    <p class="help-block">1024x1024 den küçük olmalıdır</p>
                </div>
            </div>

            {!! Form::styledInput('company_website','Şirket Web Adresi') !!}

            {!! Form::styledInput('company_location','Şehir') !!}

            {!! Form::styledInput('name','İlan Başlığı') !!}

            <div class="form-group">
                {{ Form::label('category', 'Kategori', array('class' => 'col-sm-3 control-label')) }}

                <div class="col-sm-6">
                    {{ Form::select('category', $categories, null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Pozisyon Detayları', array('class' => 'col-sm-3 control-label')) }}
                <div class="col-sm-6">
                    {{ Form::textarea('description', null, array('class' => 'form-control')) }}
                    </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> İlan Ekle
                    </button>
                </div>
            </div>
        {{ Form::close() }}
    </div>

@endsection