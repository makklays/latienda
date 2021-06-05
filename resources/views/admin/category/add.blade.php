@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Category / Add</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle mr-2">
                <span class="fa fa-calendar"></span>
                This week
            </button>
            <a href="{{ route('adm_category_add', app()->getLocale()) }}" class="btn btn-sm btn-outline-secondary">Add</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('adm_category_add_process', app()->getLocale()) }}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">
                    <label for="idTitle">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="idTitle" />

                    <?php if ($errors->has('title')): ?>
                    <div class="invalid-title" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('title')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idParentId">Parent Category</label>
                    <select name="category_id" class="form-control" id="idParentId" >
                        <option value="0">-- Parent categories --</option>
                        <?php foreach($categories as $k => $item): ?>
                            <option value="{{ $item->id }}" {{ $item->id == old('category_id') ? 'selected="selected"' : '' }} >{{ $item->id }} - {{ $item->title }}</option>
                        <?php endforeach; ?>
                    </select>

                    <?php if ($errors->has('category_id')): ?>
                    <div class="invalid-category_id" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('category_id')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idDescription">Description</label>
                    <textarea name="description" class="form-control" id="idDescription" rows="3" cols="6" >{{ old('description') }}</textarea>

                    <?php if ($errors->has('description')): ?>
                    <div class="invalid-description" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('description')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idImg">Image</label>
                    <input type="file" name="img" value="{{ old('img') }}" class="form-control" id="idImg" />

                    <?php if ($errors->has('img')): ?>
                    <div class="invalid-img" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('img')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" id="idActive" checked="checked" />
                    <label class="form-check-label" for="idActive" {{ old('is_active') }} >is active</label>
                </div>

                <a href="{{ route('adm_category', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" >Cancel</a>
                <button type="submit" class="btn btn-primary">Add category</button>

                <br/><br/><br/>
            </form>
        </div>
    </div>

@endsection
