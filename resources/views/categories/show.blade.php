@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <?php foreach($cats as $k => $item): ?>
                <li class="breadcrumb-item"><a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $item->full_path]) }}" class="a-green">{{ $item->title }}</a></li>
            <?php endforeach; ?>
            <li class="breadcrumb-item" aria-current="page">{{ $category->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2">{{ $category->title }}</h1> <br/>
        </div>
    </div>

    <!-- children's categories -->
    <?php if (!empty($category_children)): ?>
        <div class="row">
            <div class="col-md-12">
                <?php foreach($category_children as $item): ?>
                    <a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $item->full_path]) }}">{{ $item->title }}</a> |
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Products -->
    <?php if (!empty($products) && $products->count() > 0): ?>
        <div class="row">
            <?php foreach($products as $k => $item): ?>
                <div class="col-md-4">
                    <div class="my-border-img-over">
                        <div class="">
                            <?php if(!empty($item->img)): ?>
                                <?php $imgs = explode('|', $item->img); ?>
                                <?php foreach($imgs as $k => $img_name): ?>
                                    <?php if($k == 1): ?>
                                        <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                            <img src="{{ asset('products/'.$item->id.'/'.$img_name) }}" class="img img-fluid" title="{{ env('APP_NAME') }} | {{ $item->title }}" alt="..." />
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                    <img src="{{ asset('images/no-logo.png') }}" style="width:200px;" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $item->title }}" alt="no-foto" />
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" class="a-green" >
                                {{ $item->title }}
                            </a>
                        </div>

                        <div class="text-center">
                            <small style="color:grey; font-size:14px;">CODE: {{ $item->sku }}</small>
                        </div>

                        <!--div>{{ $item->description }}</div-->

                        <div style="padding-top:20px;" class="text-center">
                            {{ $item->price }} EUR <strike style="font-size:16px; color:grey;">{{ $item->old_price }} EUR</strike>
                        </div>

                        <!--div style="padding-top: 20px;">
                            <a href="{{ route('product', ['locale' => app()->getLocale(), 'slug' => $item->slug]) }}" class="btn btn-success" title="{{ $item->title }}" >Detalles >></a>
                        </div-->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-12" style="padding-top:50px; padding-bottom: 500px;">
                <i>{{ trans('main.Empty') }}</i>
            </div>
        </div>
    <?php endif; ?>

    <div style="padding: 50px 0;">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>

@endsection
