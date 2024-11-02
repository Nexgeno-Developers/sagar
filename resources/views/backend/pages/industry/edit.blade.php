<form id="edit_indudtry_form" action="{{ route('Industry.update', $Industry->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-6 mb-3">
            <label>Title<span class="red">*</span></label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $Industry->title) }}" required>
        </div>

        <div class="form-group mb-3 col-sm-{{ !empty($Industry->image) ? 3 : 6 }}">
            <label>Image<span class="red">*</span></label>
            <input class="form-control" type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
        </div>
        @if (!empty($Industry->image))
            <div class="div-preview-image col-3 form-group mb-3">
                <input type="hidden" name="existing_image" value="{{ $Industry->image }}">
                <img width="180" src="{{ asset('storage/' . $Industry->image) }}">                                       
            </div>                                
        @endif

        <div class="form-group col-6 mb-3 d-none">
            <label>Status<span class="red">*</span></label>
            <select name="is_active" class="form-control">
                <option value="1" {{ old('is_active', $Industry->is_active) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $Industry->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group col-12    mb-3">
            <label>Description<span class="red">*</span></label>
            <textarea name="description" class="form-control trumbowyg">{{ old('description', $Industry->description) }}</textarea>
        </div>

        <div class="col-sm-12">
        <div class="form-group m-3 text-end">
            <button type="submit" class="btn btn-block btn-primary">Update</button>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
    initValidate('#edit_indudtry_form');

    $("#edit_indudtry_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

});
</script>