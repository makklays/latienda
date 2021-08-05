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

                            <?php if(!empty($item->product->img)): ?>
                                <?php $imgs = explode('|', $item->product->img); ?>
                                <?php foreach($imgs as $k => $img_name): ?>
                                    <?php if($k == 0): ?>
                                        <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                            <img src="{{ asset('products/'.$item->product->id.'/100/'.$img_name) }}" style="width:100px; padding:5px;" class="img img-fluid" title="{{ config('app.name') }} | {{ $item->product->title }}" alt="..." /></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                    <img src="{{ asset('images/no-logo.png') }}" style="width:100px; padding:5px;" class="img img-fluid" title="{{ config('app.name') }} | {{ $item->title }}" alt="no-foto" /></a>
                            <?php endif; ?>
                            <a href="{{ route('product', ['locale' => app()->getLocale(), 'slug' => $item->slug]) }}" class="a-flore" >{{ $item->title }}</a>
                        </div>
                        <div class="col-md-3">
                            <br/>
                            <span style="color:grey;">({{ $item->quantity }} * {{ $item->price }} €)</span>
                        </div>
                        <div class="col-md-1 text-center">
                            <br/>
                            {{ $item->quantity * $item->price }} €
                        </div>
                        <div class="col-md-2 text-right">
                            <br/>
                            <a href="{{ route('delete-from-cart', ['locale' => app()->getLocale(), 'order_item_id' => $item->id]) }}" class="a-flore"><i class="fa fa-trash"></i> {{ trans('main.Delete') }}</a>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12 alert alert-success">
                        <?= trans('main.Empty_cart_text', ['url' => route('categories', app()->getLocale())]) ?>.
                    </div>
                </div>
            <?php endif; ?>

            <br/>
            <br/>

            <?php if (!empty($order)): ?>
                <div class="row">
                    <div class="col-md-10 text-right"><b>{{ trans('status.Total') }}: </b></div>
                    <div class="col-md-2 text-left"><b>{{ $order->total_price }} €</b></div>
                </div>
            <?php endif; ?>

            <?php if (!empty($order_items) && $order_items->count() > 0): ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <br/>
                        <a href="{{ route('checkout', app()->getLocale()) }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> {{ trans('main.Checkout-order') }}</a>
                    </div>
                </div>
            <?php endif; ?>

            <br/>
            <br/>
            <br/>
            <br/>

        </div>
    </div>

@endsection
