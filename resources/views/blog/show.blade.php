@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('blog', [app()->getLocale()]) }}">{{ trans('main.blog') }}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{ $article->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center" style="padding-top:15px;">
                <?php if(!empty($article->img)): ?>
                    <img src="{{ asset('articles/'.$article->id.'/600/'.$article->img) }}" class="img img-fluid" title="{{ config('app.name') }} | {{ $article->title }}" alt="..." />
                <?php else: ?>
                    <img src="{{ asset('images/no-logo.png') }}" style="width:200px;" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $article->title }}" alt="no-foto" />
                <?php endif; ?>
            </div>

            <div class="text-center">
                <small style="color:grey; font-size:14px;">Author: {{ $article->author }}</small> <br/>
                <small style="color:grey; font-size:14px;"><i class="fa fa-eye"></i> {{ $article->count_view }}</small>
            </div>

            <h1 class="text-center text-design2">{{ $article->title }}</h1>

            <div class="text-left">
                <?= nl2br($article->full_description) ?>
            </div>
        </div>
    </div>

    <br/><br/>

@endsection
