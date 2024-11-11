<form id="edit_product_form" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="form-group col-6 mb-3">
            <label>Title<span class="red">*</span></label>
            <input required type="text" name="title" class="form-control" value="{{ old('title', $product->title) }}" required>
        </div>

        <div class="form-group col-6 mb-3">
            <label>Slug<span class="red">*</span></label>
            <input required type="text" name="slug" class="form-control" value="{{ old('slug', $product->slug) }}" required>
        </div>

        <div class="form-group mb-3 col-sm-{{ !empty($product->image) ? 3 : 6 }}">
            <label>Image</label>
            <input class="form-control" type="file" name="image" accept=".jpg,.jpeg,.png,.webp" @if (empty($product->image)) @endif>
        </div>
        @if (!empty($product->image))
            <div class="div-preview-image col-3 form-group mb-3">
                <input type="hidden" name="existing_image" value="{{ $product->image }}">
                <img width="180" src="{{ asset('storage/' . $product->image) }}">                                       
            </div>                                
        @endif

        <div class="form-group col-6 mb-3">
            <label>Status<span class="red">*</span></label>
            <select required name="is_active" class="form-control">
                <option value="1" {{ old('is_active', $product->is_active) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $product->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group col-6 mb-3">
            <label>Product Category<span class="red">*</span></label>
            <select name="product_category[]" class="form-control select2" multiple>
                @foreach($categories as $id => $title)
                    <option value="{{ $id }}" {{ in_array($id, old('product_category', $product->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $title }}
                    </option>
                @endforeach
            </select>
        </div>

        @php
            $selected_industry = $product->industry ?? '[]';
        @endphp
        <div class="form-group col-6 mb-3">
            <label>Industry</label>
            <select class="select2 form-select" name="industry[]" multiple>
                <option value="">Select Industry</option>
                @foreach($Industry as $row)
                <option value="{{ $row->id }}" {{ in_array($row->id, json_decode($selected_industry)) ? 'selected' : '' }}>{{ $row->title }}</option>
                @endforeach
            </select>
        </div>   

    </div>
    <div class="row">
        <div class="form-group col-6 mb-3 d-none">
            <label>Function Description<span class="red">*</span></label>
            <textarea name="function_description" class="form-control trumbowyg">{{ old('function_description', $product->function_description) }}</textarea>
        </div>

        <div class="form-group col-12 mb-3">
            <label>Product Description<span class="red">*</span></label>
            <textarea name="product_description" class="form-control trumbowyg">{{ old('product_description', $product->product_description) }}</textarea>
        </div>

        <div class="form-group col-6 mb-3 d-none">
            <label>Product Information<span class="red">*</span></label>
            <textarea name="product_information" class="form-control trumbowyg">{{ old('product_information', $product->product_information) }}</textarea>
        </div>

        <div class="form-group col-6 mb-3 d-none">
            <label>Delivery Description<span class="red">*</span></label>
            <textarea name="delivery_description" class="form-control trumbowyg">{{ old('delivery_description', $product->delivery_description) }}</textarea>
        </div>

        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Meta Title<span class="red">*</span></label>
                <input type="text" class="form-control"  maxlength="255" name="meta_title" value="{{ $product->meta_title }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Meta Description<span class="red">*</span></label>
                <textarea class="form-control"  maxlength="255" name="meta_description" rows="3" required>{{ $product->meta_description }}</textarea>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group m-3 text-end">
                <button type="submit" class="btn btn-block btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
    initValidate('#edit_product_form');

    $("#edit_product_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

});
</script>