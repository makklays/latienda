@extends('admin.main-admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-shopping-basket"></i> {{ trans('admin.Product') }} / {{ trans('admin.Edit') }} / {{ $product->title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('adm_product_add', app()->getLocale()) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> {{ trans('admin.Add_product') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('adm_product_edit_process', [app()->getLocale(), 'id' => $product->id]) }}" method="POST" enctype="multipart/form-data" multiple >
                @csrf

                <div class="form-group">
                    <label for="idSku">SKU</label>
                    <input type="text" name="sku" value="{{ $product->sku }}" class="form-control" id="idSku" />

                    <?php if ($errors->has('sku')): ?>
                    <div class="invalid-title" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('sku')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idTitle">{{ trans('admin.Title') }}</label>
                    <input type="text" name="title" value="{{ $product->title }}" class="form-control" id="idTitle" />

                    <?php if ($errors->has('title')): ?>
                    <div class="invalid-title" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('title')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idSlug">Slug</label>
                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control" id="idSlug" />

                    <?php if ($errors->has('slug')): ?>
                    <div class="invalid-slug" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('slug')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idParentId">{{ trans('admin.Category') }}</label>
                    <select name="category_id" class="form-control" id="idParentId" >
                        <option value="">-- Select category of product --</option>
                        <?php foreach($categories as $k => $item): ?>
                        <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected="selected"' : '' }} >{{ $item->id }} - {{ $item->title }}</option>
                        <?php endforeach; ?>
                    </select>

                    <?php if ($errors->has('category_id')): ?>
                    <div class="invalid-category_id" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('category_id')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idDescription">{{ trans('admin.Description') }}</label>
                    <textarea name="description" class="form-control" id="idDescription" rows="3" cols="6" >{{ $product->description }}</textarea>

                    <?php if ($errors->has('description')): ?>
                    <div class="invalid-description" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('description')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idFullDescription">{{ trans('admin.Full_description') }}</label>
                    <textarea name="full_description" class="form-control" id="idFullDescription" rows="5" cols="6" >{{ $product->full_description }}</textarea>

                    <?php if ($errors->has('full_description')): ?>
                    <div class="invalid-full-description" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('full_description')?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="idPrice">{{ trans('admin.Price') }} (EUR)</label>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" id="idPrice" />

                    <?php if ($errors->has('price')): ?>
                    <div class="invalid-price" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('price')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idOldPrice">{{ trans('admin.Old_price') }} (EUR)</label>
                    <input type="text" name="old_price" value="{{ $product->old_price }}" class="form-control" id="idOldPrice" />

                    <?php if ($errors->has('old_price')): ?>
                    <div class="invalid-old-price" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('old_price')?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="idQuantity">{{ trans('admin.Quantity') }}</label>
                    <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" id="idQuantity" />

                    <?php if ($errors->has('quantity')): ?>
                    <div class="invalid-quantity" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('quantity')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="idNote">{{ trans('admin.Note') }}</label>
                    <textarea name="note" class="form-control" id="idNote" rows="3" >{{ $product->note }}</textarea>

                    <?php if ($errors->has('note')): ?>
                    <div class="invalid-note" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('note')?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="idImg">{{ trans('admin.Images') }}</label>
                    <input type="file" name="img[]" multiple value="{{ $product->img }}" class="form-control" id="idImg" />

                    <?php if ($errors->has('img')): ?>
                    <div class="invalid-img" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('img')?></div>
                    <?php endif; ?>

                    <?php if(!empty($product->img)): ?>
                        <?php $imgs = explode('|', $product->img); ?>
                        <?php foreach($imgs as $k => $img_name): ?>
                            <img src="{{ asset('products/'.$product->id.'/350/'.$img_name) }}" style="width:200px;" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $product->title }}" alt="..." />
                        <?php endforeach; ?>
                    <?php else: ?>
                        <img src="{{ asset('images/no-logo.png') }}" class="img img-thumbnail" title="{{ config('app.name') }} | {{ $product->title }}" alt="no-foto" />
                    <?php endif; ?>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" id="idActive" <?= $product->is_active ? 'checked="checked"' : '' ?> />
                    <label class="form-check-label" for="idActive" >{{ trans('admin.Is_active') }}</label>
                </div>

                <a href="{{ route('adm_product', app()->getLocale()) }}" class="btn btn-success" style="margin-right: 20px;" > {{ trans('admin.Cancel') }}</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> {{ trans('admin.Save_product') }}</button>

                <br/><br/>
            </form>
        </div>
    </div>

@endsection
