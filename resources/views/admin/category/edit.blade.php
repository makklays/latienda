@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-server"></i> {{ trans('admin.Category') }} / {{ trans('admin.Edit') }} / {{ $category->title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_category_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> Add category</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('adm_category_edit_process', [app()->getLocale(), 'id'=>$category->id]) }}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">
                    <label for="idTitle">{{ trans('admin.Title') }}</label>
                    <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="idTitle" />

                    <?php if ($errors->has('title')): ?>
                    <div class="invalid-title" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('title')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idSlug">Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" id="idSlug" />

                    <?php if ($errors->has('slug')): ?>
                    <div class="invalid-slug" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('slug')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idParentId">{{ trans('admin.Parent_category') }}</label>
                    <select name="category_id" class="form-control" id="idParentId" >
                        <option value="0">-- {{ trans('admin.Select_category_of_product') }} --</option>
                        <?php foreach($categories as $k => $item): ?>
                        <option value="{{ $item->id }}" {{ $item->id == $category->parent_id ? 'selected="selected"' : '' }} >{{ $item->id }} - {{ $item->title }}</option>
                        <?php endforeach; ?>
                    </select>

                    <?php if ($errors->has('category_id')): ?>
                    <div class="invalid-category_id" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('category_id')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idDescription">{{ trans('admin.Description') }}</label>
                    <textarea name="description" class="form-control" id="idDescription" rows="3" cols="6" >{{ $category->description }}</textarea>

                    <?php if ($errors->has('description')): ?>
                    <div class="invalid-description" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('description')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idImg">{{ trans('admin.Images') }}</label>
                    <input type="file" name="img" value="{{ $category->img }}" class="form-control" id="idImg" />

                    <?php if ($errors->has('img')): ?>
                    <div class="invalid-img" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('img')?></div>
                    <?php endif; ?>

                    <div class="" style="margin: 10px 0 0 0; padding: 10px 0 0 0;">
                        <?php if(!empty($category->img) && file_exists(public_path('/../storage/app/categories/'.$category->id.'/200/'.$category->img))): ?>
                            <img src="{{ asset('categories/'.$category->id.'/200/'.$category->img) }}" style="width:200px;" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $category->title }}" alt="..." />
                        <?php else: ?>
                            <img src="{{ asset('images/no-logo.png') }}" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $category->title }}" alt="no-foto" />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" id="idActive" <?= $category->is_active ? 'checked="checked"' : '' ?> />
                    <label class="form-check-label" for="idActive">{{ trans('admin.Is_active') }}</label>
                </div>

                <a href="{{ route('adm_category', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" > {{ trans('admin.Cancel') }}</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> {{ trans('admin.Save_category') }}</button>

                <br/><br/><br/>
            </form>
        </div>
    </div>

@endsection
