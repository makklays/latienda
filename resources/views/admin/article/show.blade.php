@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-file-alt"></i> {{ trans('admin.Article') }} / {{ $article->title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_article_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> {{ trans('admin.Add_article') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped mb-0">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $article->id }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Language') }}</th>
                    <td>{{ $article->locale }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Title') }}</th>
                    <td>{{ $article->title }}</td>
                </tr>
                <tr>
                    <th scope="row">Slug</th>
                    <td>{{ $article->slug }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Description') }}</th>
                    <td><?= !empty($article->description) ? nl2br($article->description) : '-' ?></td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Full_description') }}</th>
                    <td><?= !empty($article->full_description) ? nl2br($article->full_description) : '-' ?></td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Images') }}</th>
                    <td>
                        <?php if(!empty($article->img) && file_exists(public_path('/../storage/app/articles/'.$article->id.'/336/'.$article->img))): ?>
                        <img src="{{ asset('articles/'.$article->id.'/336/'.$article->img) }}" style="width:200px;" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $article->title }}" alt="..." />
                        <?php else: ?>
                        <img src="{{ asset('images/no-logo.png') }}" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $article->title }}" alt="no-foto" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Is_active') }}</th>
                    <td><?= $article->is_active == 1 ? '<span style="color:green;">'.trans('admin.Yes').'</span>' : '<span style="color:red;">'.trans('admin.No').'</span>' ?></td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Author') }}</th>
                    <td>{{ $article->author }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Count_view') }}</th>
                    <td>{{ $article->count_view }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Created_at') }}</th>
                    <td>{{ $article->created_at }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('admin.Updated_at') }}</th>
                    <td>{{ $article->updated_at }}</td>
                </tr>
                </tbody>
            </table>

            <br/>
            <a href="{{ route('adm_articles', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" > {{ trans('admin.Cancel') }}</a>

            <a href="{{ route('adm_article_edit', [app()->getLocale(), 'id' => $article->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> {{ trans('admin.Edit') }}</a>
            <a href="{{ route('adm_article_delete', [app()->getLocale(), 'id' => $article->id]) }}" class="btn btn-primary" onclick="javascript: confirm('Are you want to delete this category ID={{ $article->id }} ?');"><i class="fa fa-trash"></i> {{ trans('admin.Delete') }}</a>

            <br/><br/>
        </div>
    </div>

    <br/><br/>

@endsection
