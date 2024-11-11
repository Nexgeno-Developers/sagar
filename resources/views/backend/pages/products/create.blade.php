<form id="create_product_form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-6 mb-3">
            <label>Title<span class="red">*</span></label>
            <input required type="text" name="title" class="form-control" value="{{ old('title') }}" >
        </div>

        <div class="form-group col-6 mb-3">
            <label>Slug<span class="red">*</span></label>
            <input required type="text" name="slug" class="form-control" value="{{ old('slug') }}" >
        </div>

        <div class="form-group col-6 mb-3">
            <label>Image<span class="red">*</span></label>
            <input required type="file" name="image" class="form-control">
        </div>

        <div class="form-group col-6 mb-3">
            <label>Status<span class="red">*</span></label>
            <select required name="is_active" class="form-control">
                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group col-6 mb-3">
            <label>Product Category<span class="red">*</span></label>
            <select required name="product_category[]" class="form-control select2" multiple>
                @foreach($categories as $id => $title)
                    <option value="{{ $id }}" {{ in_array($id, old('product_category', [])) ? 'selected' : '' }}>
                        {{ $title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-3 mb-3">
            <label>Industry</label>
            <select class="select2 form-select" name="industry[]" multiple>
                <option value="" disabled>Select Industry</option>
                @foreach($Industry as $row)
                <option value="{{ $row->id }}">{{ $row->title }}
                </option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-6 mb-3">
            <label>Function Description<span class="red">*</span></label>
            <textarea name="function_description" class="form-control trumbowyg">{{ old('function_description') }}</textarea>
        </div>

        <div class="form-group col-6 mb-3">
            <label>Product Description<span class="red">*</span></label>
            <textarea name="product_description" class="form-control trumbowyg">{{ old('product_description') }}</textarea>
        </div>

        <div class="form-group col-6 mb-3">
            <label>Product Information<span class="red">*</span></label>
            <textarea name="product_information" class="form-control trumbowyg">{{ old('product_information') }}</textarea>
        </div>

        <div class="form-group col-6 mb-3">
            <label>Delivery Description<span class="red">*</span></label>
            <textarea name="delivery_description" class="form-control trumbowyg">{{ old('delivery_description') }}</textarea>
        </div>

        <div class="form-group col-12">
            <label>Meta Title<span class="red">*</span></label>
            <input required type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
        </div>

        <div class="form-group col-12">
            <label>Meta Description<span class="red">*</span></label>
            <textarea required name="meta_description" class="form-control">{{ old('meta_description') }}</textarea>
        </div>

        <div class="col-sm-12">
        <div class="form-group m-3 text-end">
            <button type="submit" class="btn btn-block btn-primary">Create</button>
        </div>
    </div>
    </div>
</form>
<script>
$(document).ready(function() {
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
    initValidate('#create_product_form');

    $("#create_product_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

});
</script>