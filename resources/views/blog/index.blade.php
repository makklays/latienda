@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.blog') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2">{{ trans('main.blog') }}</h1> <br/>

            <?php if (!empty($articles) && $articles->count() > 0): ?>
                <div class="row">
                    <?php foreach($articles as $k => $item): ?>
                    <div class="col-md-4">
                        <div class="my-border-img-over">
                            <div class="text-center">
                                <?php if(!empty($item->img)): ?>
                                    <a href="{{ route('blog_show', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                        <img src="{{ asset('articles/'.$item->id.'/336/'.$item->img) }}" class="img img-fluid" title="{{ config('app.name') }} | {{ $item->title }}" alt="..." /></a>
                                <?php else: ?>
                                    <a href="{{ route('blog_show', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" >
                                        <img src="{{ asset('images/no-logo.png') }}" style="width:200px;" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $item->title }}" alt="no-foto" /></a>
                                <?php endif; ?>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('blog_show', ['slug' => $item->slug, 'locale' => app()->getLocale()]) }}" class="a-flore" >
                                    {{ $item->title }}
                                </a>
                            </div>

                            <div class="text-center">
                                <small style="color:grey; font-size:14px;">Author: {{ $item->author }}</small>
                            </div>

                            <div class="text-center">
                                <small style="color:grey; font-size:14px;"><i class="fa fa-eye"></i> {{ $item->count_view }}</small>
                            </div>

                            <!--div>{{ $item->description }}</div-->

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

        </div>
    </div>

    <div style="padding: 50px 0;">
        {{ $articles->links('pagination::bootstrap-4') }}
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
