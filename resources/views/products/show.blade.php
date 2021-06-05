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
                            <?php if(!empty($product->img)): ?>
                                <img class="img img--fullwidth" src="{{ asset('storage/products/'.$product->id.'/'.$product->img) }}" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="..." />
                            <?php else: ?>
                                <img class="img img--fullwidth" src="{{ asset('storage/111.png') }}" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="no-foto" />
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <strong style="color:grey; font-size:14px;">Code: {{ $product->sku }}</strong>
                            <br/>
                            <?= nl2br($product->description) ?>
                            <br/><br/>
                            Price: {{ $product->price }} EUR     <strike style="font-size:16px; color:grey;">{{ $product->old_price }} EUR</strike>
                            <br/><br/>
                            <form action="{{ route('add_to_cart', app()->getLocale()) }}" method="POST">
                                @csrf
                                <input type="hidden" name="sku" value="{{ $product->sku }}" />
                                <input type="hidden" name="quantity" value="5" />
                                <input type="submit" value="Add to cart" />
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
    </div>

    <script>
        $('#myTab a').on('click', function (event) {
            event.preventDefault()
            $(this).tab('show')
        });
    </script>

@endsection
