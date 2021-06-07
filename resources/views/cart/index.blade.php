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

            <?php if (!empty($order_items)): ?>
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
                            <a href="{{ route('delete-from-cart', ['locale' => app()->getLocale(), 'order_product_id' => $item->id]) }}" >Delete</a>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <br/>
            <br/>

            <?php if (!empty($order)): ?>
                <div class="row">
                    <div class="col-md-10 text-right">Total: </div>
                    <div class="col-md-2 text-right">{{ $order->total_price }} €</div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12 text-center">
                    <form action="{{ route('purchase_process', ['locale' => app()->getLocale()]) }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $order->id }}" />
                        <input type="submit" class="btn btn-success" value="Purchase" />
                    </form>
                </div>
            </div>

            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

        </div>
    </div>

@endsection
