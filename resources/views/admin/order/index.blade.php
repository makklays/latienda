@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-file-invoice"></i> {{ trans('admin.Orders') }}</h1>
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

        <?php if(!empty($orders)): ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="text-center">{{ trans('status.ID') }}</th>
                        <th>{{ trans('status.Customer') }}</th>
                        <th class="text-center">{{ trans('status.Status') }}</th>
                        <th class="text-center">{{ trans('status.Count') }}</th>
                        <th>{{ trans('status.Note') }}</th>
                        <th class="text-center">{{ trans('status.Total') }} (EUR)
                        <th class="text-center">{{ trans('status.Actions') }}</th>
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
                            <?php $name = 'status.' . $item->order_status->name; ?>
                            <td class="text-center">{{ trans($name) }}</td>
                            <td class="text-center">{{ $item->count_products }}</td>
                            <td>{{ !empty($item->note) ? $item->note : '-' }}</td>
                            <td class="text-center">{{ $item->total_price }}</td>
                            <td class="text-center">
                                <a href="{{ route('adm_order_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> {{ trans('admin.Preview') }}</a>
                                <a href="{{ route('adm_order_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('admin.Edit_note') }}</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <br/>
            <i>{{ trans('main.Empty') }}</i>
        <?php endif; ?>
    </div>

@endsection
