@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-file-alt"></i> {{ trans('admin.Article') }} / {{ trans('admin.Edit') }} / {{ $article->title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_article_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> {{ trans('admin.Add_article') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('adm_article_edit_process', [app()->getLocale(), 'id' => $article->id]) }}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">
                    <label for="idParentId">{{ trans('admin.Language') }}</label>
                    <select name="locale" class="form-control" id="idParentId" style="width:100px;">
                        <?php foreach(['es','en','ru'] as $k => $item): ?>
                        <option value="{{ $item }}" {{ $item == $article->locale ? 'selected="selected"' : '' }} >{{ $item }}</option>
                        <?php endforeach; ?>
                    </select>

                    <?php if ($errors->has('locale')): ?>
                    <div class="invalid-locale" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('locale')?></div>
                    <?php endif; ?>
                </div>


                <div class="form-group">
                    <label for="idTitle">{{ trans('admin.Title') }}</label>
                    <input type="text" name="title" value="{{ $article->title }}" class="form-control" id="idTitle" />

                    <?php if ($errors->has('title')): ?>
                    <div class="invalid-title" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('title')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idSlug">Slug</label>
                    <input type="text" name="slug" value="{{ $article->slug }}" class="form-control" id="idSlug" />

                    <?php if ($errors->has('slug')): ?>
                    <div class="invalid-slug" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('slug')?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="idDescription">{{ trans('admin.Description') }}</label>
                    <textarea name="description" class="form-control" id="idDescription" rows="3" cols="6" >{{ $article->description }}</textarea>

                    <?php if ($errors->has('description')): ?>
                    <div class="invalid-description" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('description')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idFullDescription">{{ trans('admin.Full_description') }}</label>
                    <textarea name="full_description" class="form-control" id="idFullDescription" rows="12" cols="6" >{{ $article->full_description }}</textarea>

                    <?php if ($errors->has('full_description')): ?>
                    <div class="invalid-full-description" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('full_description')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idImg">{{ trans('admin.Images') }}</label>
                    <input type="file" name="img" value="{{ $article->img }}" class="form-control" id="idImg" />

                    <?php if ($errors->has('img')): ?>
                    <div class="invalid-img" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('img')?></div>
                    <?php endif; ?>

                    <div class="" style="margin: 10px 0 0 0; padding: 10px 0 0 0;">
                        <?php if(!empty($article->img) && file_exists(public_path('/../storage/app/articles/'.$article->id.'/336/'.$article->img))): ?>
                        <img src="{{ asset('articles/'.$article->id.'/336/'.$article->img) }}" style="width:200px;" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $article->title }}" alt="..." />
                        <?php else: ?>
                        <img src="{{ asset('images/no-logo.png') }}" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $article->title }}" alt="no-foto" />
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="idAuthor">{{ trans('admin.Author') }}</label>
                    <input type="text" name="author" value="{{ $article->author }}" class="form-control" id="idAuthor" />

                    <?php if ($errors->has('author')): ?>
                    <div class="invalid-author" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('author')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idCountView">{{ trans('admin.Count_view') }}</label>
                    <input type="text" name="count_view" value="{{ $article->count_view }}" class="form-control" id="idCountView" />

                    <?php if ($errors->has('count_view')): ?>
                    <div class="invalid-count-view" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('count_view')?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" id="idActive" <?= $article->is_active ? 'checked="checked"' : '' ?> />
                    <label class="form-check-label" for="idActive">{{ trans('admin.Is_active') }}</label>
                </div>

                <a href="{{ route('adm_articles', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" > {{ trans('admin.Cancel') }}</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> {{ trans('admin.Save_article') }}</button>

                <br/><br/><br/>
            </form>
        </div>
    </div>

@endsection
