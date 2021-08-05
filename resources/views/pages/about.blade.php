@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.about') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2">{{ trans('main.about') }}</h1> <br/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ trans('main.About_description') }}

            <br/><br/><br/><br/><br/><br/><br/><br/><br/>
        </div>
    </div>

@endsection
