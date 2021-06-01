@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.Checkout canceled') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2">{{ trans('main.Checkout canceled') }}</h1> <br/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <section>
                <p>Forgot to add something to your cart? Shop around then come back to pay!</p>
            </section>
        </div>
    </div>

@endsection
