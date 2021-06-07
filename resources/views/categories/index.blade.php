@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.categories') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2">{{ trans('main.categories') }}</h1> <br/>
        </div>

        <?php if (!empty($categories)): ?>
            <div class="col-md-12">
                <div class="row">
                    <?php foreach($categories as $item): ?>
                        <div class="col-md-4 text-center" style="margin-bottom: 30px;">
                            <?php if(!empty($item->img) && file_exists(public_path('/../storage/app/categories/'.$item->id.'/'.$item->img))): ?>
                                <a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $item->slug]) }}">
                                    <img src="{{ asset('categories/'.$item->id.'/'.$item->img) }}" style="width:200px; height:200px; border-radius:50%; border:2px solid grey;" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $item->title }}" alt="..." />
                                </a>
                            <?php else: ?>
                                <img src="{{ asset('images/no-logo.png') }}" style="width:200px; height:200px; border-radius:50%; border:2px solid grey;" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $item->title }}" alt="no-foto" />
                            <?php endif; ?>

                            <div><a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $item->slug]) }}">{{ $item->title }}</a></div>
                            <!--small>12 шт.</small-->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="col-md-12">{{ trans('main.empty') }}</div>
        <?php endif; ?>
    </div>

@endsection
