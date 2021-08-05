@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-user"></i> {{ trans('admin.Customer') }} / #{{ $customer->id }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{ trans('admin.Total') }}: {{ $count_customers }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped mb-0">
                <tbody>
                <tr>
                    <th scope="row">{{ trans('admin.ID') }}</th>
                    <td>{{ $customer->id }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Firstname') }}</th>
                    <td>{{ !empty($customer->firstname) ? $customer->firstname : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Lastname') }}</th>
                    <td>{{ !empty($customer->lastname) ? $customer->lastname : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Phone') }}</th>
                    <td>{{ !empty($customer->phone) ? $customer->phone : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Email') }}</th>
                    <td><?= !empty($customer->email) ? '<a href="mailto:'.$customer->email.'">' . $customer->email . '</a>' : '-' ?></td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Locale') }}</th>
                    <td>{{ $customer->locale }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Email_verified_at') }}</th>
                    <td>{{ !empty($customer->email_verified_at) ? $customer->email_verified_at : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Note') }}</th>
                    <td>{{ !empty($customer->note) ? $customer->note : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Created_at') }}</th>
                    <td>{{ $customer->created_at }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Updated_at') }}</th>
                    <td>{{ $customer->updated_at }}</td>
                </tr>
                </tbody>
            </table>

            <br/>
            <a href="{{ route('adm_customers', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" > {{ trans('admin.Cancel') }}</a>

            <br/><br/>
        </div>
    </div>

@endsection
