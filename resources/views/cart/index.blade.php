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
                                    <?php if($k == 1): ?>
                                        <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                            <img src="{{ asset('products/'.$item->product->id.'/'.$img_name) }}" style="width:100px; padding:5px;" class="img img-fluid" title="{{ env('APP_NAME') }} | {{ $item->product->title }}" alt="..." /></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                    <img src="{{ asset('images/no-logo.png') }}" style="width:100px; padding:5px;" class="img img-fluid" title="{{ env('APP_NAME') }} | {{ $item->title }}" alt="no-foto" /></a>
                            <?php endif; ?>
                            <a href="{{ route('product', ['locale' => app()->getLocale(), 'slug' => $item->slug]) }}" class="a-green" >{{ $item->title }}</a>
                        </div>
                        <div class="col-md-3">
                            <br/>
                            {{ $item->quantity }} шт. / {{ $item->price }} €
                        </div>
                        <div class="col-md-3 text-right">
                            <br/>
                            {{ $item->quantity * $item->price }} €
                            <a href="{{ route('delete-from-cart', ['locale' => app()->getLocale(), 'order_item_id' => $item->id]) }}"> Delete</a>
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
                        <!--form action="{{ route('checkout', ['locale' => app()->getLocale()]) }}" method="get">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="hidden" value="{{ $order->id }}" />

                            <input type="submit" class="btn btn-success" value="Checkout" />
                        </form-->

                        <a href="{{ route('checkout', app()->getLocale()) }}" class="btn btn-success">Checkout</a>
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

    <!--script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe("pk_test_TYooMQauvdEDq54NiTphI7jx");
        var checkoutButton = document.getElementById("checkout-button");

        checkoutButton.addEventListener("click", function () {
            fetch("{{ route('checkout', app()->getLocale()) }}"+'?_token=' + '{{ csrf_token() }}', {
                method: "POST",
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (session) {
                return stripe.redirectToCheckout({ sessionId: session.id });
            })
            .then(function (result) {
                // If redirectToCheckout fails due to a browser or network
                // error, you should display the localized error message to your
                // customer using error.message.
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function (error) {
                console.error("Error:", error);
            });
        });
    </script-->

@endsection
