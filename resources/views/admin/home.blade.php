@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
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
            {{ $user->name }} - {{ $user->email }} <br/><br/>
        <?php endif; ?>
    </div>

    <div class="">
        Products - {{ $products_count }} <br/>
        Categories - {{ $categories_count }} <br/><br/>

        Orders [status: new] - {{ $orders_count_new }} <br/>
        Orders [status: 2] - {{ $orders_count_ }} <br/><br/>

        Customers - {{ $customers_count }}
    </div>

@endsection
