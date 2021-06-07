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

        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Description</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row" style="padding: 30px 0 50px 0;">

                        <div class="col-md-6">

                            <div>
                                <?php if(!empty($product->img)): ?>
                                    <?php $imgs = json_decode($product->img); ?>
                                    <?php foreach($imgs as $k => $img_name): ?>
                                        <?php if($k == 1): ?>
                                            <a href="{{ route('product', ['slug' => $product->slug, 'locale' => app()->getLocale()]) }}" >
                                                <img src="{{ asset('products/'.$product->id.'/'.$img_name) }}" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="..." />
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <img src="{{ asset('images/no-logo.png') }}" style="width:200px;" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="no-foto" />
                                <?php endif; ?>
                            </div>

                            <div>
                                <?php foreach($imgs as $k => $img_name): ?>
                                <a href="{{ route('product', ['slug' => $product->slug, 'locale' => app()->getLocale()]) }}" >
                                    <img src="{{ asset('products/'.$product->id.'/'.$img_name) }}" style="width:100px;" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="..." />
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <strong style="color:grey; font-size:14px;">Code: {{ $product->sku }}</strong>
                            <br/>
                            <?= nl2br($product->description) ?>
                            <br/><br/>
                            <strong style="font-size:28px;">{{ $product->price }} €</strong>     <strike style="font-size:18px; color:grey;">{{ $product->old_price }} €</strike>
                            <br/><br/>
                            <div>
                                <div id="id-left-price" class="left-price">-</div>
                                <div id="id-center-price" class="center-price">1</div>
                                <div id="id-right-price" class="right-price">+</div>
                            </div>
                            <br/><br/><br/>
                            <form action="{{ route('add_to_cart', app()->getLocale()) }}" method="POST">
                                @csrf
                                <input type="hidden" name="sku" value="{{ $product->sku }}" />
                                <input id="id-quantity" type="hidden" name="quantity" value="" />
                                <input type="submit" class="btn btn-success" value="Add to cart" />
                            </form>
                            <br/>
                            <br/>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row" style="padding: 30px 0 50px 0;">
                        <div class="col-md-12">
                            <?= nl2br($product->full_description) ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <h2 class="text-center" style="font-size:50px;">Productos relacionados</h2>
            <div>
                ///
            </div>

            <br/><br/>
        </div>
    </div>

    <script>
        $('#myTab a').on('click', function (event) {
            event.preventDefault();
            $(this).tab('show');
        });

        // plus
        $('#id-right-price').on('click', function(event) {
            event.preventDefault();
            var val = $('#id-center-price').html();
            var new_val = parseInt(val) + 1;
            $('#id-center-price').html( new_val );
            $('#id-quantity').val( new_val );
            return false;
        });

        // minus
        $('#id-left-price').on('click', function(event) {
            event.preventDefault();
            var val = $('#id-center-price').html();
            var new_val = parseInt( val ) - 1;
            if (new_val >= 1) {
                $('#id-center-price').html( new_val );
                $('#id-quantity').val( new_val );
            }
            return false;
        });
    </script>

@endsection
