@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.cart') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2">{{ trans('main.Shopping cart') }}</h1> <br/>

            <?php if (!empty($order_items) && $order_items->count() > 0): ?>
                <div class="row">
                    <?php $i = 1; ?>
                    <?php foreach($order_items as $k => $item): ?>
                        <div class="col-md-6">
                            <?=$i?>.
                            <a href="{{ route('product', ['locale' => app()->getLocale(), 'slug' => $item->slug]) }}" >{{ $item->title }}</a>
                        </div>
                        <div class="col-md-3">
                            {{ $item->quantity }} шт. / {{ $item->price }} €
                        </div>
                        <div class="col-md-3 text-right">
                            {{ $item->quantity * $item->price }} €
                            <a href="{{ route('delete-from-cart', ['locale' => app()->getLocale(), 'order_item_id' => $item->id]) }}" >Delete</a>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12 alert alert-success">
                        Ahora tu cesta es suvio! <br/>
                        Puedes empezar tus comprados con las <a href="{{ route('categories', app()->getLocale()) }}">categories</a> de flores.
                    </div>
                </div>
            <?php endif; ?>

            <br/>
            <br/>

            <?php if (!empty($order)): ?>
                <div class="row">
                    <div class="col-md-10 text-right">Total: </div>
                    <div class="col-md-2 text-left">{{ $order->total_price }} €</div>
                </div>
            <?php endif; ?>

            <?php if (!empty($order_items) && $order_items->count() > 0): ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <form action="{{ route('purchase_process', ['locale' => app()->getLocale()]) }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $order->id }}" />
                            <input type="submit" class="btn btn-success" value="Purchase" />
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

        </div>
    </div>

@endsection
