@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_product_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> Add Product</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Title</th>
                    <th class="text-center">SKU</th>
                    <th class="text-center">Price (USD)</th>
                    <th>Note</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $k => $item): ?>
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td class="text-center">{{ $item->sku }}</td>
                        <td class="text-center">{{ $item->price }}</td>
                        <td>{{ !empty($item->note) ? $item->note : '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('adm_product_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> Preview</a>
                            <a href="{{ route('adm_product_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{ route('adm_product_delete', [app()->getLocale(), 'id' => $item->id]) }}" onclick="javascript: confirm('Are you want to delete this product ID={{ $item->id }} ?');"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br/>

        {{ $products->links('pagination::bootstrap-4') }}

        <br/><br/>
    </div>

@endsection
