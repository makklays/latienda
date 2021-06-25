@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-file-alt"></i> {{ trans('admin.Articles') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_article_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> {{ trans('admin.Add_article') }}</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th class="text-center">{{ trans('admin.ID') }}</th>
                <th>{{ trans('admin.Title') }}</th>
                <th>{{ trans('admin.Language') }}</th>
                <th class="text-center">{{ trans('admin.Author') }}</th>
                <th>Slug</th>
                <th class="text-center">{{ trans('admin.Images') }}</th>
                <th class="text-center">{{ trans('admin.Is_active') }}</th>
                <th class="text-center">{{ trans('admin.Actions') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($articles as $k => $item): ?>
            <tr>
                <td class="text-center">{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->locale }}</td>
                <td class="text-center">{{ $item->author }}</td>
                <td>{{ $item->slug }}</td>
                <td class="text-center"><?= !empty($item->img) ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                <td class="text-center"><?= $item->is_active == 1 ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                <td class="text-center">
                    <a href="{{ route('adm_article_show', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-eye"></i> {{ trans('admin.Preview') }}</a>
                    <a href="{{ route('adm_article_edit', [app()->getLocale(), 'id' => $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
                    <a href="{{ route('adm_article_delete', [app()->getLocale(), 'id' => $item->id]) }}" onclick="javascript: return confirm('{{ trans('admin.Are you want to delete this article ID=:ID', ['ID' => $item->id]) }}');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <br/>

        {{ $articles->links('pagination::bootstrap-4') }}

        <br/><br/>
    </div>

@endsection
