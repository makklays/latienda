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
            <form action="{{ route('adm_category_add', app()->getLocale()) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="idTitle">Title</label>
                    <input type="text" name="title" value="" class="form-control" id="idTitle" />
                </div>
                <div class="form-group">
                    <label for="idParentId">Parent Category</label>
                    <select name="parent_id" class="form-control" id="idParentId" >
                        <option value="0">-- Parent categories --</option>
                        <?php foreach($categories as $k => $item): ?>
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="idDescription">Description</label>
                    <textarea name="description" class="form-control" id="idDescription" rows="3" cols="6" ></textarea>
                </div>
                <div class="form-group">
                    <label for="idImg">Image</label>
                    <input type="file" name="img" value="" class="form-control" id="idImg" />
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" id="idActive">
                    <label class="form-check-label" for="idActive">is active</label>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

@endsection
