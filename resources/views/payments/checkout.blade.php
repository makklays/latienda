@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.Checkout') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-design2">{{ trans('main.Checkout') }}</h1>

            <form action="{{ route('checkout_data_process', app()->getLocale()) }}" method="POST" enctype="multipart/form-data" >
                @csrf

                <h3>{{ trans('main.Details_order') }}</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id-firstname1" class="form-label">{{ trans('main.Name') }}</label>
                            <input id="id-firstname1" class="form-control" type="text" name="firstname1" value="{{ !empty($user->firstname) ? $user->firstname : old('firstname1') }}" />

                            @error('firstname1')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id-phone1" class="form-label">{{ trans('main.Phone') }}</label>
                            <input id="id-phone1" class="form-control" type="text" name="phone1" value="{{ !empty($user->phone) ? $user->phone : old('phone1') }}" />

                            @error('phone1')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id-delivery" class="form-label">{{ trans('main.Type_delivery') }}</label>
                            <select id="id-delivery" class="form-control" name="d_delivery_id">
                                <?php foreach($type_of_delivery as $k => $itm): ?>
                                <?php $name_lang = 'name'; //'name_'.app()->getLocale(); ?>
                                <option value="{{ $itm->id }}" {{ !empty($user->d_delivery_id) && $itm->id == $user->d_delivery_id ? 'selected="selected"' : '' }}>{{ $itm->$name_lang }}</option>
                                <?php endforeach; ?>
                            </select>

                            @error('d_delivery_id')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id-lastname1" class="form-label">{{ trans('main.Surname') }}</label>
                            <input id="id-lastname1" aria-describedby="id-lastname1" class="form-control" type="text" name="lastname1" value="{{ !empty($user->lastname) ? $user->lastname : old('lastname1') }}" />

                            @error('lastname1')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id-email1" class="form-label">E-mail</label>
                            <input id="id-email1" class="form-control" type="text" name="email1" value="{{ !empty($user->email) ? $user->email : old('email1') }}" />

                            @error('email1')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <br/>
                <h3>{{ trans('main.Send_to_different_address') }}</h3>

                <div class="row">

                    <div id="id-addons" style="{{ old('d_delivery_id') == 2 || old('d_delivery_id') == 3 ? 'display:none;' : 'display:contents;' }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id-firstname" class="form-label">{{ trans('main.Name') }}</label>
                                <input id="id-firstname" class="form-control" type="text" name="firstname" value="{{ !empty($order->firstname) ? $order->firstname : old('firstname') }}" />

                                @error('firstname')
                                    <div class="alert my-alert-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id-lastname" class="form-label">{{ trans('main.Surname') }}</label>
                                <input id="id-lastname" class="form-control" type="text" name="lastname" value="{{ !empty($order->lastname) ? $order->lastname : old('lastname') }}" />

                                @error('lastname')
                                    <div class="alert my-alert-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id-address" class="form-label">{{ trans('main.Address') }}</label>
                                <input id="id-address" class="form-control" type="text" name="address" value="{{ !empty($order->address) ? $order->address : old('address') }}" />

                                @error('address')
                                    <div class="alert my-alert-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id-city" class="form-label">{{ trans('main.Village_City') }}</label>
                                <input id="id-city" class="form-control" type="text" name="city" value="{{ !empty($order->city) ? $order->city : old('city') }}" />

                                @error('city')
                                    <div class="alert my-alert-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id-provincia" class="form-label">{{ trans('main.Provincia') }}</label>
                                <select id="id-provincia" class="form-control" name="provincia">
                                    <?php foreach($provincias as $k => $value): ?>
                                        <?php $name_lang = 'name_'.app()->getLocale(); ?>
                                        <option value="{{ $value->id }}" {{ $value->id == old('provincia') ? 'selected="selected"' : '' }}>{{ $value->$name_lang }}</option>
                                    <?php endforeach; ?>
                                </select>

                                @error('provincia')
                                    <div class="alert my-alert-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id-zip" class="form-label">{{ trans('main.Zip') }}</label>
                                <input id="id-zip" class="form-control" type="text" name="zip" value="{{ !empty($order->zip) ? $order->zip : old('zip') }}" />

                                @error('zip')
                                    <div class="alert my-alert-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id-period" class="form-label">{{ trans('main.Horrario_entrega_preferente') }}</label>
                            <input id="id-period" class="form-control" type="text" name="period" value="{{ !empty($order->period) ? $order->period : old('period') }}" placeholder="{{ trans('main.Period_entrega') }}" />

                            @error('period')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id-date" class="form-label">{{ trans('main.Fecha_entrega') }}</label>
                            <input id="id-date" class="form-control" type="text" name="date" value="{{ !empty($order->date) ? $order->date : old('date') }}" />

                            @error('date')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id-dedication" class="form-label">{{ trans('main.Dedicatoria') }}</label>
                            <textarea id="id-dedication" class="form-control" type="text" name="dedication" placeholder="{{ trans('main.Placeholder_2') }}" >{{ !empty($order->dedication) ? $order->dedication : old('dedication') }}</textarea>

                            @error('dedication')
                                <div class="alert my-alert-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <br/>
                <h3>{{ trans('main.Your_order') }}</h3>

                <?php if (!empty($order_items) && $order_items->count() > 0): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{ trans('status.Product') }}</th>
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

                <!--
                    <div class="row">
                        <div class="col-md-12 alert alert-success">
                            Ahora tu cesta es suvio! <br/>
                            Puedes empezar tus comprados con las <a href="{{ route('categories', app()->getLocale()) }}">categories</a> de flores.
                        </div>
                    </div>
                -->

                <?php if(!empty($order_items) && $order_items->count() > 0): ?>
                <button type="submit" class="btn btn-success" style="float:left; margin-right:15px;" ><i class="fa fa-map-marked"></i> {{ trans('main.Confirm_datas') }}</button>
                <?php endif ?>
            </form>

            <?php /*if($can_pay): ?>
                <button id="checkout-button" class="btn btn-success"><i class="fa fa-money-check"></i> {{ trans('main.Purchase') }}</button>
            <?php endif;*/ ?>

            <br/><br/><br/><br/><br/>
        </div>
    </div>

    <script type="text/javascript">
        $('#id-delivery').on('change', function(){
            if ($(this).val() == 2 || $(this).val() == 3) {
                $('#id-addons').css('display', 'contents');
            } else {
                $('#id-addons').css('display', 'none');
            }
        });
    </script>

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
