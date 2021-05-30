@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.dashboard') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">

            <br/>
            {{ $user->name }} / {{ $user->email }} <div style="color:grey;">{{ !empty($user->email_verified_at) ? '' : trans('main.Dont_confirm_email') }}</div>
            <br/>
            <a href="{{ route('da_history', app()->getLocale()) }}">{{ trans('main.dashboard_history') }}</a>
            <br/>
            <a href="{{ route('da_status', app()->getLocale()) }}">{{ trans('main.dashboard_orders') }}</a>
            <br/>
            <a href="{{ route('da_cart', app()->getLocale()) }}">{{ trans('main.dashboard_cart') }}</a>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

        </div>
    </div>

@endsection
