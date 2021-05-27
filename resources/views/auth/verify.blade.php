@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.verify_email') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1>{{ trans('main.Verify') }}</h1>
        </div>

        <div class="col-md-12">
            <?php if ($flag_verify): ?>
                <p>
                    <br/><br/><br/>
                    Tu corréo de electrónico {{ $user->email }} es proveren! <br/>
                    Entrara en sitio web <a href="{{ route('login', app()->getLocale()) }}">{{ trans('main.Sign Up') }}</a>
                    <br/><br/><br/><br/>
                </p>
            <?php else: ?>
                <p>
                    <br/><br/><br/>
                    Errores! Proba ya!!!
                    <br/><br/><br/><br/>
                </p>
            <?php endif; ?>
        </div>
    </div>

@endsection
