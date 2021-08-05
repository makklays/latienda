@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-chart-bar"></i> {{ trans('admin.Reports') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_report_pdf', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf"></i> {{ trans('admin.Download') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ trans('admin.To_be_construction') }}
        </div>
    </div>

@endsection
