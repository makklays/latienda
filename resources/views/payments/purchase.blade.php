@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.Purchase_order') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-design2">{{ trans('main.Purchase_order') }} #{{ $order->id }}</h1>

                <h3>{{ trans('main.Your_order') }}</h3>

                <?php if (!empty($order_items) && $order_items->count() > 0): ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>{{ trans('status.Product') }}
                        <th></th>
                        <th class="text-center">{{ trans('status.Total') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($order_items as $k => $item): ?>
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td>
                            <a href="{{ route('product', ['slug' => $item->product->slug, 'locale' => app()->getLocale()]) }}" class="a-link">{{ $item->product->title }}</a>
                        </td>
                        <td>
                            <span style="color:grey;">({{ $item->quantity }} * {{ $item->price }} €)</span>
                        </td>
                        <td class="text-center">
                            {{ $item->quantity * $item->price }} €
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center"><b>{{ $order->total_price }} €</b></td>
                    </tr>
                    </tbody>
                </table>
                <?php endif; ?>


            <?php if($can_pay): ?>
                <button id="checkout-button" class="btn btn-success"><i class="fa fa-credit-card"></i> {{ trans('main.Purchase') }}</button>
            <?php endif; ?>

            <br/><br/><br/><br/><br/>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe("pk_test_TYooMQauvdEDq54NiTphI7jx");
        var checkoutButton = document.getElementById("checkout-button");

        checkoutButton.addEventListener("click", function () {
            fetch("{{ route('checkout_process', app()->getLocale()) }}?_token={{ csrf_token() }}", {
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

            return false;
        });
    </script>

@endsection
