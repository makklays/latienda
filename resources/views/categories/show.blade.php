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

    <?php if (!empty($category_children)): ?>
        <div class="row">
            <div class="col-md-12">
                <?php foreach($category_children as $item): ?>
                    <a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $item->full_path]) }}">{{ $item->title }}</a> <br/>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            {{ $category->title }}
        </div>
    </div>

@endsection
