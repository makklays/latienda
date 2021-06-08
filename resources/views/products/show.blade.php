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
                            <?php $arr_imgs = explode('|', $product->img); ?>
                            <div>
                                <?php if(!empty($product->img)): ?>
                                    <?php foreach($arr_imgs as $k => $img_name): ?>
                                        <?php if($k == 1): ?>
                                            <a id="id-a-center" href="{{ asset('products/'.$product->id.'/'.$img_name) }}" data-fancybox data-caption="{{ env('APP_NAME') }} | {{ $product->title }}" >
                                                <img id="id-img-center" src="{{ asset('products/'.$product->id.'/'.$img_name) }}" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="..." />
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <a href="{{ route('product', ['slug' => $product->slug, 'locale' => app()->getLocale()]) }}" >
                                        <img src="{{ asset('images/no-logo.png') }}" style="width:200px;" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="no-foto" />
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div>
                                <p class="imglist" style="max-width: 1000px;">
                                    <?php foreach($arr_imgs as $k => $img_name): ?>
                                        <a href="{{ asset('products/'.$product->id.'/'.$img_name) }}" data-fancybox="images" data-caption="{{ env('APP_NAME') }} | {{ $product->title }}" >
                                            <img class="img-thumb-hover" src="{{ asset('products/'.$product->id.'/'.$img_name) }}" style="width:100px;" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="..." />
                                        </a>
                                    <?php endforeach; ?>
                                </p>
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
            <h2 class="text-center" style="font-size:50px; padding:50px 0;">Productos relacionados</h2>
            <div>
                <div class="row row-cols-1 row-cols-md-3">
                    <?php foreach($products_relacionados as $k => $itm): ?>
                        <div class="col mb-4">
                            <div class="card h-100">
                                <?php $arr_imgs = explode('|', $itm->img); ?>

                                <?php if(isset($arr_imgs[0]) && !empty($arr_imgs[0])): ?>
                                    <a href="{{ route('product', [app()->getLocale(), 'slug' => $itm->slug]) }}" >
                                        <img src="{{ asset('products/'.$itm->id.'/'.$arr_imgs[0]) }}" class="card-img-top" alt="{{ env('APP_NAME') }} | {{ $itm->title }}" />
                                    </a>
                                <?php else: ?>
                                    <img src="" class="" title="" alt="" />
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('product', [app()->getLocale(), 'slug' => $itm->slug]) }}" class="a-green">{{ $itm->title }}</a>
                                    </h5>
                                    <p class="card-text">
                                        <div>
                                            <small style="color:grey; font-size:14px;">CODE: {{ $itm->sku }}</small>
                                        </div>
                                        <div>{{ $itm->description }}</div>
                                        <div>
                                            <br/>
                                            <span>{{ $itm->price }} €</span>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
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

        //
        $('[data-fancybox="images"]').fancybox({
            buttons : [
                'slideShow',
                'share',
                'zoom',
                'fullScreen',
                'close'
            ],
            thumbs : {
                autoStart : true
            }
        });

        $('.img-thumb-hover').on('mouseenter', function(){
            //
            var url_img = $(this).attr('src');
            console.log(url_img);
            $('#id-img-center').attr('src', url_img);
            $('#id-a-center').attr('href', url_img);
            return false;
        });
    </script>

@endsection
