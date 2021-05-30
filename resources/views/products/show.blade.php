@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.show') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2">{{ $product->title }}</h1> <br/>

            <br/>
            Code: {{ $product->sku }}
            <br/>
            {{ $product->price }} EUR
            <br/>
            {{ $product->full_description }}

            <br/>
            <br/>
            <form action="{{ route('add_to_cart', app()->getLocale()) }}" method="POST">
                @csrf
                <input type="hidden" name="sku" value="{{ $product->sku }}" />
                <input type="hidden" name="quantity" value="5" />
                <input type="submit" value="Add to cart" />
            </form>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
        </div>
    </div>

@endsection
