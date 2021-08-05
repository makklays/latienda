@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-shopping-basket"></i> {{ trans('admin.Products') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_product_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i>
                {{ trans('admin.Add_product') }}</a>
        </div>
    </div>

    <div class="table-responsive">

        <?php if(!empty($products)): ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="text-center">{{ trans('admin.ID') }}</th>
                        <th>{{ trans('admin.Title') }}</th>
                        <th class="text-center">{{ trans('admin.SKU') }}</th>
                        <th class="text-center">{{ trans('admin.Price') }} (EUR)</th>
                        <th class="text-center">{{ trans('admin.Category') }}</th>
                        <th>{{ trans('admin.Note') }}</th>
                        <th class="text-center">{{ trans('admin.Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $k => $item): ?>
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="text-center">{{ $item->sku }}</td>
                            <td class="text-center">{{ $item->price }}</td>
                            <td class="text-center"><?= !empty($item->category->id) ? '<a href="'.route('adm_category_show', ['locale'=>app()->getLocale(), 'id' => $item->category_id]).'">'.$item->category->title.'</a>' : '-' ?></td>
                            <td>{{ !empty($item->note) ? $item->note : '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('adm_product_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> {{ trans('admin.Preview') }}</a>
                                <a href="{{ route('adm_product_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
                                <a href="{{ route('adm_product_delete', [app()->getLocale(), 'id' => $item->id]) }}" onclick="javascript: return confirm('Are you want to delete this product ID={{ $item->id }} ?');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <br/>
            <i>{{ trans('admin.Empty') }}</i>
        <?php endif; ?>
        <br/>

        {{ $products->links('pagination::bootstrap-4') }}

        <br/><br/>
    </div>

@endsection
