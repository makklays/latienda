@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-search"></i> {{ trans('admin.Search') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            1
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <h6><i class="fa fa-shopping-basket"></i> {{ trans('admin.Products') }}</h6>
            <?php if(!empty($products)): ?>
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th class="text-center">{{ trans('admin.ID') }}</th>
                        <th>{{ trans('admin.Title') }}</th>
                        <th>{{ trans('admin.Category') }}</th>
                        <th class="text-center">{{ trans('admin.Images') }}</th>
                        <th class="text-center">{{ trans('admin.Is_active') }}</th>
                        <th class="text-center">{{ trans('admin.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($products as $k => $item): ?>
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category->title }}</td>
                        <td class="text-center"><?= !empty($item->img) ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                        <td class="text-center"><?= $item->is_active == 1 ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                        <td class="text-center">
                            <a href="{{ route('adm_product_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> {{ trans('admin.Preview') }}</a>
                            <a href="{{ route('adm_product_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
                            <a href="{{ route('adm_product_delete', [app()->getLocale(), 'id' => $item->id]) }}" onclick="javascript: return confirm('{{ trans('admin.Are you want to delete this product ID=:ID', ['ID' => $item->id]) }}');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <br/>
            <h6><i class="fa fa-server"></i> {{ trans('admin.Categories') }}</h6>
            <?php if(!empty($categories)): ?>
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th class="text-center">{{ trans('admin.ID') }}</th>
                    <th>{{ trans('admin.Title') }}</th>
                    <th class="text-center">{{ trans('admin.Count_products') }}</th>
                    <th class="text-center">{{ trans('admin.Parent_category') }}</th>
                    <th class="text-center">{{ trans('admin.Images') }}</th>
                    <th class="text-center">{{ trans('admin.Is_active') }}</th>
                    <th class="text-center">{{ trans('admin.Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $k => $item): ?>
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td class="text-center">{{ $item->products->count() }}</td>
                        <td class="text-center">{{ !empty($item->parent_category->title) ? $item->parent_category->title : '-' }}</td>
                        <td class="text-center"><?= !empty($item->img) ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                        <td class="text-center"><?= $item->is_active == 1 ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                        <td class="text-center">
                            <a href="{{ route('adm_category_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> {{ trans('admin.Preview') }}</a>
                            <a href="{{ route('adm_category_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
                            <a href="{{ route('adm_category_delete', [app()->getLocale(), 'id' => $item->id]) }}" onclick="javascript: return confirm('{{ trans('admin.Are you want to delete this product ID=:ID', ['ID' => $item->id]) }}');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>

            <br/>
            <h6><i class="fa fa-users"></i> {{ trans('admin.Customers') }}</h6>
            <?php if(!empty($customers)): ?>
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th class="text-center">{{ trans('admin.ID') }}</th>
                    <th>{{ trans('admin.Firstname') }}</th>
                    <th class="text-center">{{ trans('admin.Lastname') }}</th>
                    <th class="text-center">{{ trans('admin.Phone') }}</th>
                    <th class="text-center">{{ trans('admin.Count_orders') }}</th>
                    <th class="text-center">{{ trans('admin.Is_active') }}</th>
                    <th class="text-center">{{ trans('admin.Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($customers as $k => $item): ?>
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->firstname }}</td>
                        <td class="text-center">{{ $item->lastname }}</td>
                        <td class="text-center">{{ !empty($item->phone) ? $item->phone : '-' }}</td>
                        <td class="text-center">{{ $item->orders->count() }}</td>
                        <td class="text-center"><?= $item->is_active == 1 ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                        <td class="text-center">
                            <a href="{{ route('adm_category_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> {{ trans('admin.Preview') }}</a>
                            <a href="{{ route('adm_category_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
                            <a href="{{ route('adm_category_delete', [app()->getLocale(), 'id' => $item->id]) }}" onclick="javascript: return confirm('{{ trans('admin.Are you want to delete this product ID=:ID', ['ID' => $item->id]) }}');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>

        </div>
    </div>

@endsection
