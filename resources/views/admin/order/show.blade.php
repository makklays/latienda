@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order / #{{ $order->id }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_order_edit', [app()->getLocale(), 'id' => $order->id]) }}" class="btn btn-outline-success"><i class="fa fa-edit"></i> Edit note</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped mb-0">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <th scope="row">User ID</th>
                    <td><?= !empty($order->user_id) ? '<a href="'.route('adm_customer_show', [app()->getLocale(), 'id' => $order->user_id]).'">'.$order->customer->name.'</a>' : '-' ?></td>
                </tr>
                <tr>
                    <th scope="row">Total Price (USD)</th>
                    <td>{{ !empty($order->total_price) ? $order->total_price : '0.00' }}</td>
                </tr>
                <tr>
                    <th scope="row">Count Products</th>
                    <td>{{ !empty($order->count_products) ? $order->count_products : '0' }}</td>
                </tr>
                <tr>
                    <th scope="row">Delivery</th>
                    <td>{{ $order->delivery->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Payment</th>
                    <td>{{ $order->payment->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Address</th>
                    <td>{{ !empty($order->address) ? $order->address : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td>{{ !empty($order->order_status->name) ? $order->order_status->name : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">Note</th>
                    <td>{{ !empty($order->note) ? $order->note : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">Created at</th>
                    <td>{{ $order->created_at }}</td>
                </tr>
                <tr>
                    <th scope="row">Updated at</th>
                    <td>{{ $order->updated_at }}</td>
                </tr>
                </tbody>
            </table>

            <br/>
            <a href="{{ route('adm_orders', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" >Cancel</a>

            <a href="{{ route('adm_order_edit', [app()->getLocale(), 'id' => $order->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit note</a>

            <br/><br/>
        </div>
    </div>

@endsection
