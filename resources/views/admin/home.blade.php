@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-home"></i> {{ trans('admin.Dashboard') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span class="fa fa-calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="">
        <?php if (!empty($user->name)): ?>
        <b>{{ $user->name }} - {{ $user->email }} </b><br/><br/>
        <?php endif; ?>
    </div>

    <div class="">
        {{ trans('admin.Products') }} - {{ $products_count }} <br/>
        {{ trans('admin.Categories') }} - {{ $categories_count }} <br/><br/>

        {{ trans('admin.Customers') }} - {{ $customers_count }} <br/>
        {{ trans('admin.New_customers') }} - {{ $customers_count }} <br/><br/>

        {{ trans('admin.New_orders') }} - {{ $orders_count_new }} <br/>
        {{ trans('admin.Order_today') }} - {{ $orders_count_new }} <br/>
        {{ trans('admin.Orders_ordered') }} - {{ $orders_count_ }} <br/>
        {{ trans('admin.Orders_paid') }} - {{ $orders_count_ }} <br/>
        <br/>


    </div>

@endsection
