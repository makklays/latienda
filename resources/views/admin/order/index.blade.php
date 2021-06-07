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
                    <th class="text-center">ID</th>
                    <th>Customer</th>
                    <th class="text-center">Status</th>
                    <th>Note</th>
                    <th class="text-center">Total (USD)
                    <th>Count</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $k => $item): ?>
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>
                            <?php if(!empty($item->user_id)): ?>
                                <a href="{{ route('adm_customer_show', [app()->getLocale(), 'id' => $item->user_id]) }}">{{ $item->customer->name }}</a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td class="text-center">{{ $item->order_status->name }}</td>
                        <td>{{ !empty($item->note) ? $item->note : '-' }}</td>
                        <td class="text-center">{{ $item->total_price }}</td>
                        <td>{{ $item->count_products }}</td>
                        <td class="text-center">
                            <a href="{{ route('adm_order_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> Preview</a>
                            <a href="{{ route('adm_order_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> Edit note</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

@endsection
