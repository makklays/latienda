@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-file-invoice"></i> {{ trans('admin.Order') }} / #{{ $order->id }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_order_edit', [app()->getLocale(), 'id' => $order->id]) }}" class="btn btn-outline-success"><i class="fa fa-edit"></i> {{ trans('admin.Edit_note') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped mb-0">
                <tbody>
                <tr>
                    <th scope="row">{{ trans('admin.ID') }}</th>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.User') }} ID</th>
                    <td><?= !empty($order->user_id) ? '<a href="'.route('adm_customer_show', [app()->getLocale(), 'id' => $order->user_id]).'">'.$order->customer->name.'</a>' : '-' ?></td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Total_price') }} (EUR)</th>
                    <td>{{ !empty($order->total_price) ? $order->total_price : '0.00' }} €</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Count_products') }}</th>
                    <td>{{ !empty($order->count_products) ? $order->count_products : '0' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Delivery') }}</th>
                    <td>{{ $order->delivery->name }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Payment') }}</th>
                    <td>{{ $order->payment->name }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Address') }}</th>
                    <td>{{ !empty($order->address) ? $order->address : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Status') }}</th>
                    <?php $status = 'status.'.$order->order_status->name; ?>
                    <td>{{ !empty($order->order_status->name) ? trans($status) : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Note') }}</th>
                    <td>{{ !empty($order->note) ? $order->note : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Created_at') }}</th>
                    <td>{{ $order->created_at }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Updated_at') }}</th>
                    <td>{{ $order->updated_at }}</td>
                </tr>
                </tbody>
            </table>

            <br/>
            <a href="{{ route('adm_orders', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" > {{ trans('admin.Cancel') }}</a>

            <a href="{{ route('adm_order_edit', [app()->getLocale(), 'id' => $order->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> {{ trans('admin.Edit_note') }}</a>

            <br/><br/>
        </div>
    </div>

@endsection
