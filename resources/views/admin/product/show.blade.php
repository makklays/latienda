@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product / {{ $product->title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle mr-2">
                <span class="fa fa-calendar"></span>
                This week
            </button>
            <a href="{{ route('adm_product_add', app()->getLocale()) }}" class="btn btn-sm btn-outline-secondary">Add</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            qwqw
        </div>
    </div>

@endsection
