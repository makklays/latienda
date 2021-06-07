@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product / {{ $product->title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_product_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> Add product</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped mb-0">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Category ID</th>
                    <td>{{ $product->category_id }}</td>
                </tr>
                <tr>
                    <th scope="row">SKU</th>
                    <td>{{ $product->sku }}</td>
                </tr>
                <tr>
                    <th scope="row">Title</th>
                    <td>{{ $product->title }}</td>
                </tr>
                <tr>
                    <th scope="row">Slug</th>
                    <td>{{ $product->slug }}</td>
                </tr>
                <tr>
                    <th scope="row">Description</th>
                    <td><?= nl2br($product->description) ?></td>
                </tr>
                <tr>
                    <th scope="row">Full description</th>
                    <td><?= nl2br($product->full_description) ?></td>
                </tr>
                <tr>
                    <th scope="row">Price (USD)</th>
                    <td>{{ $product->price }}</td>
                </tr>
                <tr>
                    <th scope="row">Old Price (USD)</th>
                    <td>{{ $product->old_price }}</td>
                </tr>
                <tr>
                    <th scope="row">Quantity</th>
                    <td>{{ $product->quantity }}</td>
                </tr>
                <tr>
                    <th scope="row">Images</th>
                    <td>
                        <?php if(!empty($product->img)): ?>
                            <?php $imgs = json_decode($product->img); ?>
                            <?php foreach($imgs as $k => $img_name): ?>
                                <img src="{{ asset('products/'.$product->id.'/'.$img_name) }}" style="width:200px;" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="..." />
                            <?php endforeach; ?>
                        <?php else: ?>
                            <img src="{{ asset('images/no-logo.png') }}" class="img img-thumbnail" title="{{ env('APP_NAME') }} | {{ $product->title }}" alt="no-foto" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Is active</th>
                    <td><?= $product->is_active == 1 ? '<span style="color:green;">Yes</span>' : '<span style="color:red;">No</span>' ?></td>
                </tr>
                <tr>
                    <th scope="row">Note</th>
                    <td>{{ !empty($product->note) ? $product->note : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">Created at</th>
                    <td>{{ $product->created_at }}</td>
                </tr>
                <tr>
                    <th scope="row">Updated at</th>
                    <td>{{ $product->updated_at }}</td>
                </tr>
                </tbody>
            </table>

            <br/>
            <a href="{{ route('adm_product', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" >Cancel</a>

            <a href="{{ route('adm_product_edit', [app()->getLocale(), 'id' => $product->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
            <a href="{{ route('adm_product_delete', [app()->getLocale(), 'id' => $product->id]) }}" class="btn btn-primary" onclick="javascript: confirm('Are you want to delete this product ID={{ $product->id }} ?');"><i class="fa fa-trash"></i> Delete</a>

            <br/><br/>
        </div>
    </div>

@endsection
