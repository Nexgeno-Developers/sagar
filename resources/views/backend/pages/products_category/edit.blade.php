<form id="edit_product_category_form" action="{{ route('product-categories.update', $productCategory->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-4 mb-3">
            <label>Title<span class="red">*</span></label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $productCategory->title) }}" required>
        </div>

        <div class="form-group col-4 mb-3">
            <label>Slug<span class="red">*</span></label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $productCategory->slug) }}" required>
        </div>

        <div class="form-group col-4 mb-3">
            <label>Industry</label>
            <select class="select2 form-select" name="industry[]" multiple>
                <option value="">Select Industry</option>
                @foreach($Industry as $row)
                <option value="{{ $row->id }}" {{ in_array($row->id, explode(',', $productCategory->industry ?? '')) ? 'selected' : '' }}>{{ $row->title }}</option>
                @endforeach
            </select>
        </div>   
        
        <div class="form-group col-8 mb-3 col-sm-{{ !empty($productCategory->image) ? 3 : 6 }}">
            <label>Image<span class="red">*</span></label>
            <input class="form-control" type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
        </div>
        @if (!empty($productCategory->image))
            <div class="div-preview-image col-3 form-group mb-3">
                <input type="hidden" name="existing_image" value="{{ $productCategory->image }}">
                <img style="width:100%;" src="{{ asset('storage/' . $productCategory->image) }}">                                       
            </div>                                
        @endif

<div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Meta Title<span class="red">*</span></label>
                <input type="text" class="form-control"  maxlength="255" name="meta_title" value="{{ $productCategory->meta_title }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Meta Description<span class="red">*</span></label>
                <textarea class="form-control"  maxlength="255" name="meta_description" rows="3" required>{{ $productCategory->meta_description }}</textarea>
            </div>
        </div>


         <div class="form-group col-12 mb-3">
            <label>Description<span class="red">*</span></label>
            <textarea name="description" class="form-control trumbowyg">{{ old('description', $productCategory->description) }}</textarea>
        </div>


        <div class="form-group col-3 mb-3 d-none">
            <label>Categorys For<span class="red">*</span></label>
            <select required name="is_industry" class="form-control" required>
                <option value="1" {{ old('is_industry', $productCategory->is_industry) == 1 ? 'selected' : '' }}>Industry</option>
                <option value="0" {{ old('is_active', $productCategory->is_industry) == 0 ? 'selected' : '' }}>Products</option>
            </select>
        </div>

        

        <div class="form-group col-6 mb-3 d-none">
            <label>Status<span class="red">*</span></label>
            <select name="is_active" class="form-control">
                <option value="1" {{ old('is_active', $productCategory->is_active) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $productCategory->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

       

        

        <div class="col-sm-12">
        <div class="form-group mb-3 text-end">
            <button type="submit" class="btn btn-block btn-primary">Update</button>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
    initValidate('#edit_product_category_form');

    $("#edit_product_category_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

});
</script>