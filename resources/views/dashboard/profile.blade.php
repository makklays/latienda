@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('da_home', app()->getLocale()) }}" class="a-green">{{ trans('main.dashboard') }}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.dashboard_profile') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">

            <br/>
            <h3>{{ trans('main.dashboard_profile') }}</h3>
            <br/>

            <!--h1 class="text-center text-design2">{{ trans('main.dashboard_profile') }}</h1-->

            <form action="{{ route('da_profile_process', app()->getLocale()) }}" method="POST" >
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id-firstname1" class="form-label">{{ trans('main.Name') }}</label>
                            <input id="id-firstname1" class="form-control" type="text" name="firstname" value="{{ !empty($user->firstname) ? $user->firstname : old('firstname') }}" />

                            @error('firstname1')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id-phone1" class="form-label">{{ trans('main.Phone') }}</label>
                            <input id="id-phone1" class="form-control" type="text" name="phone" value="{{ !empty($user->phone) ? $user->phone : old('phone') }}" />

                            @error('phone1')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id-lastname1" class="form-label">{{ trans('main.Surname') }}</label>
                            <input id="id-lastname1" aria-describedby="id-lastname1" class="form-control" type="text" name="lastname" value="{{ !empty($user->lastname) ? $user->lastname : old('lastname') }}" />

                            @error('lastname1')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id-email1" class="form-label">E-mail</label>
                            <input id="id-email1" class="form-control" type="text" name="email" value="{{ !empty($user->email) ? $user->email : old('email') }}" />

                            @error('email1')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <br/>
                <button type="submit" class="btn btn-success" style="float:left; margin-right:15px;" ><i class="fa fa-map-marked"></i> {{ trans('main.Confirm_datas') }}</button>

            </form>

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
