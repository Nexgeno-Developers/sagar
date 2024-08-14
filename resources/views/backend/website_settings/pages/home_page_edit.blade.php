<form id="edit_home_form" action="{{url(route('custom-pages.update', $page->id))}}" method="post"
    enctype="multipart/form-data">
    @csrf
    @php
    if (!empty($page->content)) {
        $data = $page->content;
        $decoded_data = json_decode($data);
        $banners = $decoded_data->banner ?? '';
        $about_content = $decoded_data->about_content ?? '';
        $about_image = $decoded_data->about_image ?? '';
        $wwd = $decoded_data->wwd_image ?? '';
        $scp_content = $decoded_data->scp_content ?? '';
        $scp_image1 = $decoded_data->scp_image1 ?? '';
        $scp_pdf1 = $decoded_data->scp_pdf1 ?? '';
        $scp_text1 = $decoded_data->scp_text1 ?? '';
        $scp_image2 = $decoded_data->scp_image2 ?? '';
        $scp_text2 = $decoded_data->scp_text2 ?? '';
        $scp_url = $decoded_data->scp_url ?? '';
        $scp_image3 = $decoded_data->scp_image3 ?? '';
        $scp_pdf2 = $decoded_data->scp_pdf2 ?? '';
        $scp_text3 = $decoded_data->scp_text3 ?? '';
        $cocs_description = $decoded_data->cocs_description ?? '';
    } else {
        // If content is empty, set default empty values
        $banners = '';
        $about_content = '';
        $about_image = '';
        $wwd = '';
        $scp_content = '';
        $scp_image1 = '';
        $scp_pdf1 = '';
        $scp_text1 = '';
        $scp_image2 = '';
        $scp_text2 = '';
        $scp_url = '';
        $scp_image3 = '';
        $scp_pdf2 = '';
        $scp_text3 = '';
        $cocs_description = '';
    }
@endphp

    <div class="row">
        <input type="hidden" name="id" value="{{ $page->id }}">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Title <span class="red">*</span></label>
                <input type="text" class="form-control" name="title" value="{{ $page->title }}" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Slug (URL) <span class="red">*</span></label>
                <input type="text" class="form-control" value="{{ $page->slug }}" name="slug" required>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Status <span class="red">*</span></label>
                <select class="form-select" name="is_active" required>
                    <option value="0" {{ $page->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                    <option value="1" {{ $page->is_active == 1 ? 'selected' : '' }}>Active</option>
                </select>
            </div>
        </div>

        @if (!empty($banners))        
            @foreach ($banners as $index => $banner)
                    <div class="row gallery-image-row">
                        <div class="col-md-9">
                            <div class="form-group row mb-3 ">
                                <div class="col-3 form-group mb-3">
                                    <label>Banner Image</label>
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
                                    <label>Banner Text</label>
                                    <input type="text" class="form-control" name="banner_text[]" value="{{$banner->text}}" @if (empty($banner->text)) required @endif>
                                </div>
                                <div class="col-6 form-group mb-3">
                                    <label>Banner Button Text </label>
                                    <input class="form-control" type="text" value="{{$banner->button}}" id="banner_button[]" name="banner_button[]" @if (empty($banner->button)) required @endif>
                                </div>
                                <div class="col-6 form-group mb-3">
                                    <label>Banner Url </label>
                                    <input class="form-control" type="text" value="{{$banner->url}}" id="banner_url[]" name="banner_url[]" @if (empty($banner->url)) required @endif>
                                </div>

                            </div>
                        </div>
                        <div class="add-row-col-3-div col-md-3">
                            <button type="button" class="btn btn-outline-success add-row m-2">Add More +</button>
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
                            <label>Banner Image</label>
                            <input class="form-control" type="file" id="banner" name="banner[]"
                                accept=".jpg,.jpeg,.png,.webp">
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>Banner Text</label>
                            <input type="text" class="form-control" name="banner_text[]">
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>Banner Button Text </label>
                            <input class="form-control" type="text" id="banner_button[]" name="banner_button[]">
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>Banner Url </label>
                            <input class="form-control" type="text" id="banner_url[]" name="banner_url[]">
                        </div>

                    </div>
                </div>
                <div class="add-row-col-3-div col-md-3">
                    <button type="button" class="btn btn-outline-success add-row my-2">Add More +</button>
                </div>
            </div>
        @endif
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Product section <span class="red">*</span></label>
                <select class="form-select" name="product_ids[]" required>
                    @foreach ($products as $product )
                    <option value="{{$product->id}}" {{ $page->product_ids == $product->id ? 'selected' : '' }}>
                        {{$product->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>
        <h3>About Section</h3>
        <div class="row">
            <div class="col-sm-{{ !empty($about_image) ? 3 : 6 }}">
                <div class="form-group mb-3">
                    <label>About Images</label>
                    <input class="form-control" type="file" id="about_image" name="about_image" accept=".jpg,.jpeg,.png,.webp" @if (empty($about_image)) required @endif >
                </div>
            </div>
            @if (!empty($about_image))
                <div class="div-preview-image col-3 form-group mb-3">
                    <input type="hidden" name="existing_about_image" value="{{ $about_image }}">
                    <img width="180" src="{{ asset('storage/' . $about_image) }}">                                       
                </div>
            @endif

            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label>About Content<span class="red">*</span></label>
                    <textarea class="form-control" name="about_content" rows="3"  @if (empty($about_content)) required @endif>{{ $about_content }}</textarea>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Industry section <span class="red">*</span></label>
                <select class="form-select" name="product_category_id" required>
                    @foreach ($product_categories as $product_category )
                    <option value="{{$product_category->id}}"
                        {{-- $page->product_ids == $product->id ? 'selected' : '' --}}>{{$product_category->title}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <hr>
        <h3>What we do Section</h3>
        @if (!empty($wwd))
            @foreach ($wwd as $index => $wwd_data )
                <div class="row gallery-image-row2">
                    <div class="col-md-9">
                        <div class="form-group row mb-3 ">
                            <div class="col-6 form-group mb-3">
                                <label>Image</label>
                                <input class="form-control" type="file" id="banner" name="wwd_image[]" accept=".jpg,.jpeg,.png,.webp" @if (empty($wwd_data->image)) required @endif>
                            </div>
                            @if (!empty($wwd_data->image))
                                <div class="div-preview-image col-6 form-group mb-3">
                                    <input type="hidden" name="existing_wwd_image[]" value="{{ $wwd_data->image }}">
                                    <img width="180" src="{{ asset('storage/' . $wwd_data->image) }}">                                      
                                </div>                                
                            @endif
                            <div class="col-6 form-group mb-3">
                                <label>Text</label>
                                <input type="text" class="form-control" name="wwd_text[]" value="{{$wwd_data->text}}" @if (empty($wwd_data->text)) required @endif>
                            </div>
                            <div class="col-6 form-group mb-3">
                                <label>Content<span class="red">*</span></label>
                                <textarea class="form-control" name="wwd_content[]" rows="3"  @if (empty($wwd_data->content)) required @endif>{{$wwd_data->content}}</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="add-row-col-3-div col-md-3 ">
                        <button type="button" class="btn btn-outline-success add-row2 m-2">Add More +</button>
                        @if ($index > 0)
                        <button type="button" class="btn btn-outline-danger remove-row2 my-2">Remove</button>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="row gallery-image-row2">
                <div class="col-md-9">
                    <div class="form-group row mb-3 ">
                        <div class="col-6 form-group mb-3">
                            <label>Image</label>
                            <input class="form-control" type="file" id="banner" name="wwd_image[]" accept=".jpg,.jpeg,.png,.webp">
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>Text</label>
                            <input type="text" class="form-control" name="wwd_text[]">
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>Content<span class="red">*</span></label>
                            <textarea class="form-control" name="wwd_content[]" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="add-row-col-3-div col-md-3 ">
                    <button type="button" class="btn btn-outline-success add-row2 my-2">Add More +</button>
                </div>
            </div>
        @endif
        

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Activities Section <span class="red">*</span></label>
                <select class="form-select" name="product_category_id" required>
                    @foreach ($post_categories as $post_category )
                    <option value="{{$post_category->id}}"
                        {{-- $page->product_ids == $product->id ? 'selected' : '' --}}>{{$post_category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>
        <h3>Supply Chain Partner</h3>
        <div class="col-md-12">
            <div class="col-12 form-group mb-3">
                <label>Content<span class="red">*</span></label>
                <textarea class="form-control" name="scp_content" rows="3"  @if (empty($scp_content)) required @endif>{{$scp_content}}</textarea>
            </div>
            <div class="form-group row mb-3 ">  
                <div class="form-group mb-3 col-sm-{{ !empty($scp_image1) ? 3 : 6 }}">
                    <label>Image</label>
                    <input class="form-control" type="file" name="scp_image1" accept=".jpg,.jpeg,.png,.webp" @if (empty($scp_image1)) required @endif>
                </div>
                @if (!empty($scp_image1))
                    <div class="div-preview-image col-3 form-group mb-3">
                        <input type="hidden" name="existing_scp_image1" value="{{ $scp_image1 }}">
                        <img width="180" src="{{ asset('storage/' . $scp_image1) }}">                                       
                    </div>                                
                @endif
                <div class="col-6 form-group mb-3">
                    <label>Text</label>
                    <input type="text" class="form-control" name="scp_text1" value="{{$scp_text1}}" @if (empty($scp_text1)) required @endif>
                </div>
                <div class="col-6 form-group mb-3">
                    <label>PDF</label>
                    <input class="form-control" type="file" name="scp_pdf1" @if (empty($scp_pdf1)) required @endif>
                    @if (!empty($scp_pdf1))
                        <input type="hidden" name="existing_scp_pdf1" value="{{ $scp_pdf1 }}">
                        <a target="_blank" class="mt-2 btn btn-primary" href="{{ asset('storage/' . $scp_pdf1) }}"> View PDF</a>
                    @endif
                </div>
                
            </div>
            <div class="form-group row mb-3 ">
                <div class="form-group mb-3 col-sm-{{ !empty($scp_image2) ? 3 : 6 }}">
                    <label>Image</label>
                    <input class="form-control" type="file" name="scp_image2" accept=".jpg,.jpeg,.png,.webp" @if (empty($scp_image2)) required @endif>
                </div>
                @if (!empty($scp_image2))
                    <div class="div-preview-image col-3 form-group mb-3">
                        <input type="hidden" name="existing_scp_image2" value="{{ $scp_image2 }}">
                        <img width="180" src="{{ asset('storage/' . $scp_image2) }}">                                       
                    </div>                                
                @endif
               
                <div class="col-6 form-group mb-3">
                    <label>Text</label>
                    <input type="text" class="form-control" name="scp_text2" value="{{$scp_text2}}" @if (empty($scp_text2)) required @endif>
                </div>
                <div class="col-6 form-group mb-3">
                    <label>URL</label>
                    <input type="text" class="form-control" name="scp_url"  value="{{$scp_url}}" @if (empty($scp_url)) required @endif>
                </div>
            </div>
            <div class="form-group row mb-3 ">
                <div class="form-group mb-3 col-sm-{{ !empty($scp_image3) ? 3 : 6 }}">
                    <label>Image</label>
                    <input class="form-control" type="file" name="scp_image3" accept=".jpg,.jpeg,.png,.webp" @if (empty($scp_image3)) required @endif>
                </div>
                @if (!empty($scp_image3))
                    <div class="div-preview-image col-3 form-group mb-3">
                        <input type="hidden" name="existing_scp_image3" value="{{ $scp_image3 }}">
                        <img width="180" src="{{ asset('storage/' . $scp_image3) }}">                                       
                    </div>                                
                @endif
                <div class="col-6 form-group mb-3">
                    <label>Text</label>
                    <input type="text" class="form-control" name="scp_text3" value="{{$scp_text3}}" @if (empty($scp_text3)) required @endif>
                </div>
                <div class="col-6 form-group mb-3">
                    <label>PDF</label>
                    <input class="form-control" type="file" name="scp_pdf2" @if (empty($scp_pdf2)) required @endif>
                    @if (!empty($scp_pdf2))
                        <input type="hidden" name="existing_scp_pdf2" value="{{ $scp_pdf2 }}">
                        <a target="_blank" class="mt-2 btn btn-primary" href="{{ asset('storage/' . $scp_pdf2) }}"> View PDF</a>
                    @endif
                </div>
            </div>
        </div>

        <hr>
        <h3>Code Of Conduct Section</h3>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Description<span class="red">*</span></label>
                <textarea class="form-control" name="cocs_description" rows="3" required>{{$cocs_description }}</textarea>
            </div>
        </div>

        <hr>
        <h3>Seo Section</h3>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Meta Title<span class="red">*</span></label>
                <input type="text" class="form-control" name="meta_title" value="{{ $page->meta_title }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Meta Description<span class="red">*</span></label>
                <textarea class="form-control" name="meta_description" rows="3" required>{{ $page->meta_description }}</textarea>
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

    initValidate('#edit_home_form');

    $("#edit_home_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }
    // Add row functionality for Banner Section
    $(document).on('click', '.add-row', function() {
        var newRow = $('.gallery-image-row').first().clone();
        newRow.find('input').val('');
        newRow.find('.add-row-col-3-div').remove();
        newRow.find('.div-preview-image ').remove();
        newRow.append(
            '<div class="col-md-3"><button type="button" class="btn btn-outline-success add-row m-2">Add More +</button><button type="button" class="btn btn-outline-danger remove-row my-2">Remove</button></div>'
            );
        $('.gallery-image-row').last().after(newRow);
    });

    // Remove row functionality for Banner Section
    $(document).on('click', '.remove-row', function() {
        if ($('.gallery-image-row').length > 1) {
            $(this).closest('.gallery-image-row').remove();
        } else {
            alert('At least one row is required.');
        }
    });

    // Repeat for What We Do Section and other sections
    $(document).on('click', '.add-row2', function() {
        var newRow = $('.gallery-image-row2').first().clone();
        newRow.find('input, textarea').val('');
        newRow.find('.add-row-col-3-div').remove();
        newRow.find('.div-preview-image').remove();
        newRow.append(
            '<div class="col-md-3"><button type="button" class="btn btn-outline-success add-row2 m-2">Add More +</button><button type="button" class="btn btn-outline-danger remove-row2 my-2">Remove</button></div>'
            );
        $('.gallery-image-row2').last().after(newRow);
    });

    // Remove row functionality for What We Do Section
    $(document).on('click', '.remove-row2', function() {
        if ($('.gallery-image-row2').length > 1) {
            $(this).closest('.gallery-image-row2').remove();
        } else {
            alert('At least one row is required.');
        }
    });

});
</script>