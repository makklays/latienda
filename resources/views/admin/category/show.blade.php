@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-server"></i> {{ trans('admin.Category') }} / {{ $category->title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_category_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> {{ trans('admin.Add_category') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped mb-0">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Parent ID</th>
                    <td>
                        {{ $category->parent_id }} -
                        <?php if(!empty($category->parent_category->title)): ?>
                            <a href="{{ route('adm_category_show', [app()->getLocale(), 'id' => $category->parent_id]) }}">{{ $category->parent_category->title }}</a>
                        <?php else: ?>
                            {{ trans('admin.No') }}
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Count_products') }}</th>
                    <td>{{ $category->products->count() }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Title') }}</th>
                    <td>{{ $category->title }}</td>
                </tr>
                <tr>
                    <th scope="row">Slug</th>
                    <td>{{ $category->slug }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Description') }}</th>
                    <td>{{ !empty($category->description) ? $category->description : '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Images') }}</th>
                    <td>
                        <?php if(!empty($category->img) && file_exists(public_path('/../storage/app/categories/'.$category->id.'/200/'.$category->img))): ?>
                            <img src="{{ asset('categories/'.$category->id.'/200/'.$category->img) }}" style="width:200px;" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $category->title }}" alt="..." />
                        <?php else: ?>
                            <img src="{{ asset('images/no-logo.png') }}" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $category->title }}" alt="no-foto" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Is_active') }}</th>
                    <td><?= $category->is_active == 1 ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Created_at') }}</th>
                    <td>{{ $category->created_at }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Updated_at') }}</th>
                    <td>{{ $category->updated_at }}</td>
                </tr>
                </tbody>
            </table>

            <br/>
            <a href="{{ route('adm_category', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" > {{ trans('admin.Cancel') }}</a>

            <a href="{{ route('adm_category_edit', [app()->getLocale(), 'id' => $category->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
            <a href="{{ route('adm_category_delete', [app()->getLocale(), 'id' => $category->id]) }}" class="btn btn-primary" onclick="javascript: confirm('Are you want to delete this category ID={{ $category->id }} ?');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>

            <br/><br/>
        </div>
    </div>

    <?php if (!empty($category->children_category) && $category->children_category->count() > 0): ?>
        <div class="row">
            <div class="col-md-12">

                <br/><br/>
                <h2>{{ trans('admin.Sub-categories') }} - {{ $category->children_category->count() }}</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th class="text-center">{{ trans('admin.ID') }}</th>
                            <th>{{ trans('admin.Title') }}</th>
                            <th class="text-center">{{ trans('admin.Count_products') }}</th>
                            <th>Slug</th>
                            <th class="text-center">{{ trans('admin.Images') }}</th>
                            <th class="text-center">{{ trans('admin.Is_active') }}</th>
                            <th class="text-center">{{ trans('admin.Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($category->children_category as $k => $item): ?>
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td class="text-center">{{ $item->products->count() }}</td>
                                <td>{{ $item->slug }}</td>
                                <td class="text-center"><?= !empty($item->img) ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                                <td class="text-center"><?= $item->is_active == 1 ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                                <td class="text-center">
                                    <a href="{{ route('adm_category_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> {{ trans('admin.Preview') }}</a>
                                    <a href="{{ route('adm_category_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
                                    <a href="{{ route('adm_category_delete', [app()->getLocale(), 'id' => $item->id]) }}" onclick="javascript: confirm('Are you want to delete this category ID={{ $item->id }} ?');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <br/><br/>

            </div>
        </div>
    <?php endif; ?>

    <br/><br/>

@endsection
