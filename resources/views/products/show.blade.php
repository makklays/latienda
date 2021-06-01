@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <?php if(!empty($cat_parent) && !empty($cat_parent->full_path)): ?>
                <li class="breadcrumb-item"><a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $cat_parent->full_path]) }}" class="a-green">{{ $cat_parent->title }}</a></li>
            <?php endif; ?>
            <?php if(!empty($cat) && !empty($cat->full_path)): ?>
                <li class="breadcrumb-item"><a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $cat->full_path]) }}" class="a-green">{{ $cat->title }}</a></li>
            <?php endif; ?>
            <li class="breadcrumb-item" aria-current="page">{{ $product->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2">{{ $product->title }}</h1> <br/>
        </div>
        <div class="col-md-6">
            <?php if(!empty($product->img)): ?>
                <img src="{{ asset('storage/products/'.$product->id.'/'.$product->img) }}" alt="." title="{{ env('APP_NAME') }} | {{ $product->title }}" />
            <?php else: ?>
                <img src="{{ asset('storage/nofoto.png') }}" alt="." title="{{ env('APP_NAME') }} | {{ $product->title }}" />
            <?php endif; ?>
        </div>
        <div class="col-md-6">
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
