@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_category_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> Add category</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Title</th>
                    <th>Parent category</th>
                    <th>Slug</th>
                    <th class="text-center">Parent ID</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Is active</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $k => $item): ?>
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td><?= !empty($item->parent_category->title) ? '<a href="'.route('adm_category_show', [app()->getLocale(), 'id' => $item->parent_category->id]).'">'.$item->parent_category->title.'</a>' : '-' ?></td>
                        <td>{{ $item->slug }}</td>
                        <td class="text-center">{{ $item->parent_id }}</td>
                        <td class="text-center"><?= !empty($item->img) ? '<span style="color:green;">Yes</span>' : '<span style="color:red;">No</span>' ?></td>
                        <td class="text-center"><?= $item->is_active == 1 ? '<span style="color:green;">Yes</span>' : '<span style="color:red;">No</span>' ?></td>
                        <td class="text-center">
                            <a href="{{ route('adm_category_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> Preview</a>
                            <a href="{{ route('adm_category_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{ route('adm_category_delete', [app()->getLocale(), 'id' => $item->id]) }}" onclick="javascript: confirm('Are you want to delete this category ID={{ $item->id }} ?');"><i class="fa fa-trash"></i> Delete</a>
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
