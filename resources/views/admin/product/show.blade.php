@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-shopping-basket"></i> {{ trans('admin.Product') }} / {{ $product->title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_product_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> {{ trans('admin.Add_product') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped mb-0">
                <tbody>
                <tr>
                    <th scope="row">{{ trans('admin.ID') }}</th>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Category_ID') }}</th>
                    <td>{{ $product->category_id }} -  <a href="{{ route('adm_category_show', [app()->getLocale(), 'id'=>$product->category_id]) }}">{{ $product->category->title }}</a></td>
                </tr>
                <tr>
                    <th scope="row">SKU</th>
                    <td>{{ $product->sku }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Title') }}</th>
                    <td>{{ $product->title }}</td>
                </tr>
                <tr>
                    <th scope="row">Slug</th>
                    <td>{{ $product->slug }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Description') }}</th>
                    <td><?= nl2br($product->description) ?></td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Full_description') }}</th>
                    <td><?= nl2br($product->full_description) ?></td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Price') }} (EUR)</th>
                    <td>{{ $product->price }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Old_price') }} (EUR)</th>
                    <td>{{ $product->old_price }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Quantity') }}</th>
                    <td>{{ !empty($product->quantity) ? $product->quantity : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Images') }}</th>
                    <td>
                        <?php if(!empty($product->img)): ?>
                            <?php $imgs = explode('|', $product->img); ?>

                            <?php foreach($imgs as $k => $img_name): ?>
                                <img src="{{ asset('products/'.$product->id.'/350/'.$img_name) }}" style="width:200px;" class="img img-fluid" title="{{ config('app.name') }} | {{ $product->title }}" alt="..." />
                            <?php endforeach; ?>
                        <?php else: ?>
                            <img src="{{ asset('images/no-logo.png') }}" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $product->title }}" alt="no-foto" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Is_active') }}</th>
                    <td><?= $product->is_active == 1 ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Note') }}</th>
                    <td>{{ !empty($product->note) ? $product->note : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Created_at') }}</th>
                    <td>{{ $product->created_at }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Updated_at') }}</th>
                    <td>{{ $product->updated_at }}</td>
                </tr>
                </tbody>
            </table>

            <br/>
            <a href="{{ route('adm_product', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" >{{ trans('admin.Cancel') }}</a>

            <a href="{{ route('adm_product_edit', [app()->getLocale(), 'id' => $product->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
            <a href="{{ route('adm_product_delete', [app()->getLocale(), 'id' => $product->id]) }}" class="btn btn-primary" onclick="javascript: confirm('Are you want to delete this product ID={{ $product->id }} ?');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>

            <br/><br/>
        </div>
    </div>

    <br/><br/>

@endsection
