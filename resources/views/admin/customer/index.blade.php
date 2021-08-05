@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-users"></i> {{ trans('admin.Customers') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{ trans('admin.Total') }}: {{ $count_customers }}
        </div>
    </div>

    <div class="table-responsive">

        <?php if(!empty($customers)): ?>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th class="text-center">{{ trans('admin.ID') }}</th>
                <th>{{ trans('admin.Firstname') }}</th>
                <th class="text-center">{{ trans('admin.Lastname') }}</th>
                <th class="text-center">{{ trans('admin.Phone') }}</th>
                <th class="text-center">{{ trans('admin.Locale') }}</th>
                <th>{{ trans('admin.Note') }}</th>
                <th class="text-center">{{ trans('admin.Count_orders') }}
                <th class="text-center">{{ trans('admin.Actions') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($customers as $k => $item): ?>
            <tr>
                <td class="text-center">{{ $item->id }}</td>
                <td>{{ $item->firstname }}</td>
                <td class="text-center">{{ $item->lastname }}</td>
                <td class="text-center">{{ $item->phone }}</td>
                <td class="text-center">{{ $item->locale }}</td>
                <td>{{ !empty($item->note) ? $item->note : '-' }}</td>
                <td class="text-center">{{ $item->orders->count() }}</td>
                <td class="text-center">
                    <a href="{{ route('adm_customer_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> {{ trans('admin.Preview') }}</a>
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
