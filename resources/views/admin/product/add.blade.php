@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product / Add</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_product_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> Add product</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('adm_product_add_process', app()->getLocale()) }}" method="POST" enctype="multipart/form-data" multiple >
                @csrf

                <div class="form-group">
                    <label for="idSku">SKU</label>
                    <input type="text" name="sku" value="{{ old('sku') }}" class="form-control" id="idSku" />

                    <?php if ($errors->has('sku')): ?>
                    <div class="invalid-title" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('sku')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idTitle">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="idTitle" />

                    <?php if ($errors->has('title')): ?>
                    <div class="invalid-title" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('title')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idParentId">Category</label>
                    <select name="category_id" class="form-control" id="idParentId" >
                        <option value="">-- Select category of product --</option>
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
                    <label for="idFullDescription">Full description</label>
                    <textarea name="full_description" class="form-control" id="idFullDescription" rows="5" cols="6" >{{ old('full_description') }}</textarea>

                    <?php if ($errors->has('full_description')): ?>
                    <div class="invalid-full-description" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('full_description')?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="idPrice">Price (USD)</label>
                    <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="idPrice" />

                    <?php if ($errors->has('price')): ?>
                    <div class="invalid-price" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('price')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idOldPrice">Old Price (USD)</label>
                    <input type="text" name="old_price" value="{{ old('old_price') }}" class="form-control" id="idOldPrice" />

                    <?php if ($errors->has('old_price')): ?>
                    <div class="invalid-old-price" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('old_price')?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="idQuantity">Quantity</label>
                    <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" id="idQuantity" />

                    <?php if ($errors->has('quantity')): ?>
                    <div class="invalid-quantity" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('quantity')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idNote">Note</label>
                    <textarea name="note" class="form-control" id="idNote" rows="3" >{{ old('note') }}</textarea>

                    <?php if ($errors->has('note')): ?>
                    <div class="invalid-note" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('note')?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="idImg">Image</label>
                    <input type="file" multiple name="img" value="{{ old('img') }}" class="form-control" id="idImg" />

                    <?php if ($errors->has('img')): ?>
                    <div class="invalid-img" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('img')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" id="idActive" checked="checked" />
                    <label class="form-check-label" for="idActive" >is active</label>
                </div>

                <a href="{{ route('adm_product', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" >Cancel</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add product</button>

                <br/><br/>
            </form>
        </div>
    </div>

@endsection
