@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders</h1>
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

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Customer</th>
                    <th>Count</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $k => $item): ?>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <?php if(!empty($item->user_id)): ?>
                                <a href="#">{{ $item->user_id }}</a>
                            <?php else: ?>
                                -----
                            <?php endif; ?>
                        </td>
                        <td>{{ $item->count_products }}</td>
                        <td>{{ $item->d_order_status_id }}</td>
                        <td>{{ $item->total_price }}</td>
                        <td>{{ $item->note }}</td>
                        <td>
                            <a href="{{ route('adm_order', [app()->getLocale(), 'id' => $item->id]) }}">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

@endsection
