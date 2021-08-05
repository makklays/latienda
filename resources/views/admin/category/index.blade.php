@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-server"></i> {{ trans('admin.Categories') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_category_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> {{ trans('admin.Add_category') }}</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th class="text-center">{{ trans('admin.ID') }}</th>
                    <th>{{ trans('admin.Title') }}</th>
                    <th class="text-center">{{ trans('admin.Count_products') }}</th>
                    <th>{{ trans('admin.Parent_category') }}</th>
                    <th>Slug</th>
                    <th class="text-center">Parent ID</th>
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
                        <td><?= !empty($item->parent_category->title) ? '<a href="'.route('adm_category_show', [app()->getLocale(), 'id' => $item->parent_category->id]).'">'.$item->parent_category->title.'</a>' : '-' ?></td>
                        <td>{{ $item->slug }}</td>
                        <td class="text-center">{{ $item->parent_id }}</td>
                        <td class="text-center"><?= !empty($item->img) ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                        <td class="text-center"><?= $item->is_active == 1 ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                        <td class="text-center">
                            <a href="{{ route('adm_category_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> {{ trans('admin.Preview') }}</a>
                            <a href="{{ route('adm_category_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
                            <a href="{{ route('adm_category_delete', [app()->getLocale(), 'id' => $item->id]) }}" onclick="javascript: return confirm('{{ trans('admin.Are you want to delete this category ID=:ID', ['ID' => $item->id]) }}');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br/>

        {{ $categories->links('pagination::bootstrap-4') }}

        <br/><br/>
    </div>

@endsection
