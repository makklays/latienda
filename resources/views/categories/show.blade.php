@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories', ['locale' => app()->getLocale()]) }}" class="a-green">{{ trans('main.categories') }}</a></li>
            <?php foreach($cats as $k => $item): ?>
                <li class="breadcrumb-item"><a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $item->full_path]) }}" class="a-green">{{ $item->title }}</a></li>
            <?php endforeach; ?>
            <li class="breadcrumb-item" aria-current="page">{{ $category->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2 color-flore">
                <?php if (!empty($category->img)): ?>
                    <img src="{{ asset('categories/'.$category->id.'/100/'.$category->img) }}" style="width:100px; height:100px; border-radius:50%; border:2px solid #b69721;" class="img img-fluid" title="{{ config('app.name') }} | {{ $category->title }}" alt="..." /> {{ $category->title }}</h1> <br/>
                <?php else: ?>
                    <img src="{{ asset('images/no-logo.png') }}" style="width:100px; height:100px; border-radius:50%; border:2px solid #b69721;" class="img img-fluid" title="{{ config('app.name') }} | {{ $category->title }}" alt="no-foto" /> {{ $category->title }}</h1> <br/>
                <?php endif; ?>
        </div>
    </div>

    <!-- children's categories -->
    <?php if (!empty($category_children)): ?>
        <div class="row">
            <div class="col-md-12">
                <?php foreach($category_children as $k => $item): ?>
                    <?php if ($k == count($category_children) - 1): ?>
                    <a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $item->full_path]) }}" class="a-flore">{{ $item->title }}</a>
                    <?php else: ?>
                        <a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $item->full_path]) }}" class="a-flore">{{ $item->title }}</a> <span class="span-flore"> | </span>
                    <?php endif; ?>
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
                                    <?php if($k == 0): ?>
                                        <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                            <img src="{{ asset('products/'.$item->id.'/350/'.$img_name) }}" class="img img-fluid" title="{{ config('app.name') }} | {{ $item->title }}" alt="..." /></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                    <img src="{{ asset('images/no-logo.png') }}" style="width:200px;" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $item->title }}" alt="no-foto" /></a>
                            <?php endif; ?>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('product', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" class="a-flore" >
                                {{ $item->title }}
                            </a>
                        </div>

                        <div class="text-center">
                            <small style="color:grey; font-size:14px;">Code: {{ $item->sku }}</small>
                        </div>

                        <!--div>{{ $item->description }}</div-->

                        <div style="padding-top:20px;" class="text-center">
                            {{ $item->price }} € <strike style="font-size:16px; color:grey;">{{ $item->old_price }} €</strike>
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

    <script>
        //
        $('.my-border-img-over').on('mouseover', function(){
            $(this).addClass('active');
            return false;
        });
        $('.my-border-img-over').on('mouseout', function(){
            $(this).removeClass('active');
            return false;
        });
    </script>

@endsection
