@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-file-invoice"></i> {{ trans('admin.Order') }} / {{ trans('admin.Edit') }} / #{{ $order->id }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_order_edit', [app()->getLocale(), 'id' => $order->id]) }}" class="btn btn-outline-success"><i class="fa fa-edit"></i> {{ trans('admin.Edit_order') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('adm_order_edit_process', [app()->getLocale(), 'id' => $order->id]) }}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">
                    <label for="idStatus">{{ trans('admin.Status') }}</label>
                    <select name="d_order_status_id" class="form-control" id="idStatus" >
                        <option value="0">-- Order Status ID --</option>
                        <?php foreach($orders_statuses as $k => $item): ?>
                        <?php $status = 'status.' . $item->name ?>
                        <option value="{{ $item->id }}" {{ $item->id == $order->d_order_status_id ? 'selected="selected"' : '' }} >{{ $item->id }} - {{ trans($status) }}</option>
                        <?php endforeach; ?>
                    </select>

                    <?php if ($errors->has('d_order_status_id')): ?>
                    <div class="invalid-order-status-id" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('d_order_status_id')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idNote">{{ trans('admin.Note') }}</label>
                    <textarea name="note" class="form-control" id="idNote" rows="3" >{{ $order->note }}</textarea>

                    <?php if ($errors->has('note')): ?>
                    <div class="invalid-note" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('note')?></div>
                    <?php endif; ?>
                </div>

                <a href="{{ route('adm_orders', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" > {{ trans('admin.Cancel') }}</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> {{ trans('admin.Save_order') }}</button>

                <br/><br/><br/>
            </form>
        </div>
    </div>

@endsection
