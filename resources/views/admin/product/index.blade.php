@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle mr-2">
                <span class="fa fa-calendar"></span>
                This week
            </button>
            <a href="{{ route('adm_product_add', app()->getLocale()) }}" class="btn btn-sm btn-outline-secondary">Add</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Title</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $k => $item): ?>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->sku }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->note }}</td>
                        <td>
                            <a href="{{ route('adm_product_show', [app()->getLocale(), 'id' => $item->id]) }}">View</a>
                            <a href="{{ route('adm_product_edit', [app()->getLocale(), 'id' => $item->id]) }}">Edit</a>
                            <a href="{{ route('adm_product_delete', [app()->getLocale(), 'id' => $item->id]) }}">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

@endsection