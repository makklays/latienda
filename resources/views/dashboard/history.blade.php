@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('da_home', app()->getLocale()) }}" class="a-green">{{ trans('main.dashboard') }}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.dashboard_history') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">

            <br/>
            {{ $user->name }} / {{ $user->email }}
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

        </div>
    </div>

@endsection
