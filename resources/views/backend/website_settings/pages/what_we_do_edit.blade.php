<form id="edit_home_form" action="{{url(route('custom-pages.update', $page->id))}}" method="post"
    enctype="multipart/form-data">
    @csrf
    @php
    if (!empty($page->content)) {
        $data = $page->content;
        $decoded_data = json_decode($data);
        $banners = $decoded_data->banner ?? '';
    } else {
        // If content is empty, set default empty values
        $banners = '';
    }
@endphp

    <div class="row">
        <input type="hidden" name="id" value="{{ $page->id }}">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Title <span class="red">*</span><span class="small"> (Used For Backend Name) </span></label>
                <input type="text" class="form-control" name="title"  maxlength="155" value="{{ $page->title }}" required>
            </div>
        </div>
        <div class="col-sm-6 d-none">
            <div class="form-group mb-3">
                <label>Slug (URL) <span class="red">*</span><span class="small"> (Deafult Pages Slug Not Editable) </span></label>
                <input readonly type="text" class="form-control"  maxlength="155" value="{{ $page->slug }}" name="slug" required>
            </div>
        </div>

        <div class="col-sm-6 d-none">
            <div class="form-group mb-3">
                <label>Status <span class="red">*</span><span class="small"> (Deafult Pages Status Not Editable) </span></label>
                <select class="pe-none form-select" name="is_active" required>
                    <option value="0" {{ $page->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                    <option value="1" {{ $page->is_active == 1 ? 'selected' : '' }}>Active</option>
                </select>
            </div>
        </div>
        

        @if (!empty($banners))  
        @php
            $lastindex = is_array($banners) ? count($banners) : $banners->count();
        @endphp      
            @foreach ($banners as $index => $banner)
                    <div class="row gallery-image-row">
                        <div class="col-md-9">
                            <div class="form-group row mb-3 ">
                                <div class="col-3 form-group mb-3">
                                    <label>Image <span class="red">*</span></label>
                                    <input class="form-control" type="file" id="banner" name="banner[]"
                                        accept=".jpg,.jpeg,.png,.webp" @if (empty($banner->image)) required @endif>
                                </div>
                                @if (!empty($banner->image))
                                    <div class="div-preview-image col-3 form-group mb-3">
                                        <input type="hidden" name="existing_banner_image[]" value="{{ $banner->image }}">
                                        <img width="180" src="{{ asset('storage/' . $banner->image) }}">                                       
                                    </div>
                                @endif
                                <div class="col-6 form-group mb-3">
                                    <label>Title Text <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="banner_text[]"   maxlength="155" value="{{$banner->text}}" @if (empty($banner->text)) required @endif>
                                </div>
                                <div class="col-12 form-group mb-3">
                                    <label>Description  <span class="red">*</span></label>
                                    <textarea class="form-control trumbowyg" id="description" name="description[]" rows="13" required >{{ $banner->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="add-row-col-3-div col-md-3">
                            @if ($index === 0 || $index === $lastindex - 1)
                                <button type="button" class="btn btn-outline-success add-row m-2">Add More +</button>
                            @endif
                            @if ($index > 0)
                            <button type="button" class="btn btn-outline-danger remove-row my-2">Remove</button>
                            @endif
                        </div>
                    </div>
            @endforeach
        @else
            <div class="row gallery-image-row">
                <div class="col-md-9">
                    <div class="form-group row mb-3 ">
                        <div class="col-6 form-group mb-3">
                            <label>Image <span class="red">*</span></label>
                            <input class="form-control" type="file" id="banner" name="banner[]"
                                accept=".jpg,.jpeg,.png,.webp" required>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>Title Text <span class="red">*</span></label>
                            <input type="text" class="form-control" name="banner_text[]"   maxlength="155" required>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label>Description  <span class="red">*</span></label>
                            <textarea class="form-control trumbowyg" id="description" name="description[]" rows="13" required ></textarea>
                        </div>

                    </div>
                </div>
                <div class="add-row-col-3-div col-md-3">
                    <button type="button" class="btn btn-outline-success add-row my-2">Add More +</button>
                </div>
            </div>
        @endif

        <hr>
        <h3>Seo Section</h3>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Meta Title<span class="red">*</span></label>
                <input type="text" class="form-control"  maxlength="155" name="meta_title" value="{{ $page->meta_title }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Meta Description<span class="red">*</span></label>
                <textarea class="form-control"  maxlength="255" name="meta_description" rows="3" required>{{ $page->meta_description }}</textarea>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group mb-3 text-end">
                <button type="submit" class="btn btn-block btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
    initValidate('#edit_home_form');

    $("#edit_home_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }


    var count = 0;
    // Add row functionality for Banner Section
    $(document).off('click', '.add-row').on('click', '.add-row', function() {
        var newRow = $('.gallery-image-row').first().clone();
        newRow.find('input, textarea').val('');
        newRow.find('.add-row-col-3-div').remove();
        newRow.find('.div-preview-image ').remove();

        // Clear Trumbowyg editor content
        newRow.find('.trumbowyg-editor').remove(''); // Clears the editor's inner HTML
        newRow.find('.trumbowyg').remove(''); // Clears the value of the associated textarea


        // Add new textarea with a unique class based on count
        count++; // Increment count for unique class
        var uniqueClass = `trumbowyg-${count}`;
        newRow.append(`
            <div class="col-9 form-group mb-3">
                <textarea class="form-control ${uniqueClass}" name="description[]" rows="13" required></textarea>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-outline-success add-row m-2">Add More +</button>
                <button type="button" class="btn btn-outline-danger remove-row my-2">Remove</button>
            </div>
        `);
 
        $('.gallery-image-row').last().after(newRow);

        // Reinitialize the Trumbowyg editor for the new textarea
        newRow.find(`.${uniqueClass}`).trumbowyg();
    });

    // Remove row functionality for Banner Section
    $(document).off('click', '.remove-row').on('click', '.remove-row', function() {
        if ($('.gallery-image-row').length > 1) {
            $(this).closest('.gallery-image-row').remove();
        } else {
            alert('At least one row is required.');
        }
    });

});
</script>