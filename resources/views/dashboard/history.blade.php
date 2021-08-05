@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('da_home', app()->getLocale()) }}" class="a-green">{{ trans('main.dashboard') }}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.dashboard_history') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">

            <!--br/>
            {{ $user->name }} / {{ $user->email }}-->
            <br/>

            <h3>{{ trans('main.dashboard_history') }}</h3>
            <br/>

            <?php if (!empty($orders) && $orders->count() > 0): ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">{{ trans('status.Number') }}</th>
                        <th>{{ trans('status.Status') }}</th>
                        <th class="text-center">{{ trans('status.Total') }}</th>
                        <th class="text-center">{{ trans('status.Date') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $k => $item): ?>
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>
                            <?php $main = 'status.'.$item->order_status->name ?>
                            {{ trans($main) }}
                        </td>
                        <td class="text-center">
                            {{ $item->total_price }} €
                        </td>
                        <td class="text-center">
                            {{ $item->updated_at }}
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            <?php else: ?>
                <i style="color:grey;">{{ trans('main.Empty') }}</i>
            <?php endif; ?>

            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

        </div>
    </div>

@endsection
